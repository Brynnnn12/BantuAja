<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $query = Campaign::where('status', 'active')
            ->withCount('donations');

        // Apply filters
        if ($request->has('filter')) {
            switch ($request->get('filter')) {
                case 'urgent':
                    //ini untuk campaign yang progressnya dibawah 30%
                    $query->whereRaw('(collected_amount / target_amount * 100) < 30');
                    break;
                case 'almost':
                    //ini untuk campaign yang progressnya diatas 80%
                    $query->whereRaw('(collected_amount / target_amount * 100) > 80');
                    break;
            }
        }

        // Search functionality
        if ($request->has('search') && !empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $campaigns = $query->orderByDesc('created_at')->paginate(12);

        return view('home.campaigns.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        // Load campaign with related data
        $campaign->loadCount('donations');

        // Get recent donations for this campaign
        $recentDonations = $campaign->donations()
            ->with('user')
            ->where('status', 'confirmed')
            ->latest()
            ->take(5)
            ->get();

        return view('home.campaigns.show', compact('campaign', 'recentDonations'));
    }
}
