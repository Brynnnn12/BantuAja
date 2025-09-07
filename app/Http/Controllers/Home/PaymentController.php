<?php

namespace App\Http\Controllers\Home;

use App\Models\Payment;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private const STATUS_PENDING = 'pending';
    private const STATUS_PAID = 'paid';
    private const STATUS_CONFIRMED = 'confirmed';
    private const STATUS_FAILED = 'failed';

    private const TRANSACTION_SUCCESS_STATUSES = ['capture', 'settlement'];
    private const TRANSACTION_FAILED_STATUSES = ['deny', 'expire', 'cancel'];

    /**
     * Ambil pembayaran beserta relasinya berdasarkan ID untuk user yang terautentikasi
     */
    private function findPaymentForUser(int $paymentId, bool $failOnNotFound = true)
    {
        $query = Payment::with(['donation.campaign', 'donation.user'])
            ->where('id', $paymentId)
            ->whereHas('donation', function ($query) {
                $query->where('user_id', Auth::id());
            });

        return $failOnNotFound ? $query->firstOrFail() : $query->first();
    }

    /**
     * untuk menangani ketika pembayaran tidak ditemukan
     */
    private function handlePaymentNotFound(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('home.index')->with('error', 'Pembayaran tidak ditemukan.');
    }

    /**
     * konfirmasi pembayaran dan memperbarui catatan terkait
     */
    private function confirmPayment(Payment $payment): void
    {
        $payment->update(['status' => self::STATUS_PAID]);
        $payment->donation->update(['status' => self::STATUS_CONFIRMED]);
        $payment->donation->campaign->increment('collected_amount', $payment->amount);
    }

    /**
     * Tangani pembayaran otomatis di mode sandbox
     */
    private function handleSandboxPayment(Payment $payment): void
    {
        if (!$this->isSandboxMode() || $payment->status !== self::STATUS_PENDING) {
            return;
        }

        Log::info('Auto-confirming payment in sandbox mode', ['payment_id' => $payment->id]);

        try {
            \App\Services\MidtransConfig::setConfig();
            $status = \Midtrans\Transaction::status($payment->snap_token);

            $transactionStatus = $status->transaction_status ?? null;
            if ($transactionStatus && in_array($transactionStatus, self::TRANSACTION_SUCCESS_STATUSES, true)) {
                $this->confirmPayment($payment);
            }
        } catch (\Exception $e) {
            Log::info('Midtrans API check failed, auto-confirming for sandbox', [
                'payment_id' => $payment->id,
                'error' => $e->getMessage()
            ]);

            $this->confirmPayment($payment);
        }
    }

    /**
     * Cek apakah aplikasi berjalan dalam mode sandbox
     */
    private function isSandboxMode(): bool
    {
        return config('midtrans.is_production') === false;
    }

    public function show($paymentId)
    {
        $payment = $this->findPaymentForUser($paymentId);
        return view('home.payments.show', compact('payment'));
    }


    public function process($paymentId)
    {
        $payment = $this->findPaymentForUser($paymentId);

        if ($payment->status !== self::STATUS_PENDING) {
            return redirect()->route('home.payments.show', $payment->id)
                ->with('info', 'Pembayaran sudah diproses sebelumnya.');
        }

        return view('home.payments.process', compact('payment'));
    }


    public function success(Request $request)
    {
        $paymentId = $request->query('payment_id');

        if (!$paymentId) {
            return redirect()->route('home.index')->with('error', 'Payment ID tidak ditemukan.');
        }

        $payment = $this->findPaymentForUser($paymentId, false);

        if (!$payment) {
            return $this->handlePaymentNotFound();
        }

        $this->handleSandboxPayment($payment);

        return view('home.payments.success', compact('payment'));
    }


    public function pending(Request $request)
    {
        $paymentId = $request->query('payment_id');

        if (!$paymentId) {
            return redirect()->route('home.index')->with('error', 'Parameter tidak lengkap.');
        }

        $payment = $this->findPaymentForUser($paymentId, false);

        if (!$payment) {
            return $this->handlePaymentNotFound();
        }

        return view('home.payments.pending', compact('payment'));
    }


    public function failed(Request $request)
    {
        $paymentId = $request->query('payment_id');

        if (!$paymentId) {
            return redirect()->route('home.index')->with('error', 'Payment ID tidak ditemukan.');
        }

        $payment = $this->findPaymentForUser($paymentId, false);

        if (!$payment) {
            return $this->handlePaymentNotFound();
        }

        return view('home.payments.failed', compact('payment'));
    }
    /**
     * untuk mengekstrak ID pembayaran dari ID pesanan
     */
    private function extractPaymentId(string $orderId): ?string
    {
        $parts = explode('-', $orderId);
        return $parts[1] ?? null;
    }

    /**
     * untuk memproses status transaksi dan memperbarui catatan terkait
     */
    private function processTransactionStatus(Payment $payment, string $transactionStatus): void
    {
        if (in_array($transactionStatus, self::TRANSACTION_SUCCESS_STATUSES)) {
            $this->confirmPayment($payment);
            Log::info('Payment confirmed', ['payment_id' => $payment->id, 'amount' => $payment->amount]);
        } elseif ($transactionStatus === self::STATUS_PENDING) {
            $payment->update(['status' => self::STATUS_PENDING]);
            $payment->donation->update(['status' => self::STATUS_PENDING]);
            Log::info('Payment pending', ['payment_id' => $payment->id]);
        } elseif (in_array($transactionStatus, self::TRANSACTION_FAILED_STATUSES)) {
            $payment->update(['status' => self::STATUS_FAILED]);
            $payment->donation->update(['status' => self::STATUS_FAILED]);
            Log::info('Payment failed', ['payment_id' => $payment->id, 'reason' => $transactionStatus]);
        }
    }

    /**
     * untuk menangani callback dari Midtrans atau penyedia pembayaran lainnya
     * Ini akan dipanggil oleh Midtrans atau penyedia pembayaran lainnya
     */
    public function callback(Request $request)
    {
        Log::info('Midtrans callback received', $request->all());

        \App\Services\MidtransConfig::setConfig();

        $orderId = $request->input('order_id');
        $transactionStatus = $request->input('transaction_status');

        Log::info('Processing callback', [
            'order_id' => $orderId,
            'transaction_status' => $transactionStatus
        ]);

        $paymentId = $this->extractPaymentId($orderId);
        $payment = Payment::with('donation.campaign')->find($paymentId);

        if (!$payment) {
            Log::error('Payment not found', ['payment_id' => $paymentId, 'order_id' => $orderId]);
            return response()->json(['status' => 'error', 'message' => 'Payment not found'], 404);
        }

        Log::info('Payment found', [
            'payment_id' => $payment->id,
            'current_status' => $payment->status,
            'donation_id' => $payment->donation->id,
            'campaign_id' => $payment->donation->campaign->id
        ]);

        $this->processTransactionStatus($payment, $transactionStatus);

        return response()->json(['status' => 'success']);
    }
}
