<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = Donation::paginate(10);
        return view('dashboard.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campaigns = \App\Models\Campaign::where('status', 'active')->get();
        return view('dashboard.donations.create', compact('campaigns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonationRequest $request)
    {
        // Ambil data validasi tapi hilangkan user_id dari request
        $data = $request->validated();

        // Set user_id sesuai user yang login
        $data['user_id'] = Auth::id();

        // Simpan donation
        Donation::create($data);

        return redirect()->route('donations.index')
            ->with('success', 'Donation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        $donation->load('user', 'campaign');

        return view('dashboard.donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        $donation->load('user', 'campaign');

        return view('dashboard.donations.edit', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $data = $request->validated();

        // Pastikan user_id tidak diubah
        unset($data['user_id']);

        // Simpan status lama untuk cek perubahan
        $oldStatus = $donation->status;
        $newStatus = $data['status'] ?? $oldStatus;

        // Update donation
        $donation->update($data);

        // Update collected_amount campaign jika status berubah ke confirmed / dari confirmed
        if ($oldStatus !== $newStatus) {
            $campaign = $donation->campaign;

            if ($oldStatus !== 'confirmed' && $newStatus === 'confirmed') {
                // Donasi dikonfirmasi → tambahkan jumlah
                $campaign->collected_amount += $donation->amount;
                $campaign->save();
            } elseif ($oldStatus === 'confirmed' && $newStatus !== 'confirmed') {
                // Donasi dibatalkan / gagal → kurangi jumlah
                $campaign->collected_amount -= $donation->amount;
                if ($campaign->collected_amount < 0) {
                    $campaign->collected_amount = 0;
                }
                $campaign->save();
            }
        }

        return redirect()->route('donations.index')
            ->with('success', 'Donation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully.');
    }
}
