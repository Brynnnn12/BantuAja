<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
     * untuk melihat halaman donasi
     */
    public function index()
    {
        // Get active campaigns for display (if needed)
        $campaigns = Campaign::where('status', 'active')->orderByDesc('created_at')->get();

        return view('home.donations.index', compact('campaigns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'amount' => 'required|numeric|min:10000',
        ]);

        $donation = Donation::create([
            'user_id' => Auth::id(),
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        $payment = Payment::create([
            'donation_id' => $donation->id,
            'amount' => $donation->amount,
            'status' => 'pending',
        ]);

        \App\Services\MidtransConfig::setConfig();

        $params = [
            'transaction_details' => [
                'order_id' => 'PAY-' . $payment->id . '-' . time(),
                'gross_amount' => $donation->amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $payment->update([
            'snap_token' => $snapToken,
        ]);

        return response()->json([
            'snap_token' => $snapToken,
            'payment_id' => $payment->id,
        ]);
    }
}
