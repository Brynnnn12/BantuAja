<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get statistics for hero section
        $totalCampaigns = Campaign::where('status', 'active')->count();
        $totalDonations = Donation::where('status', 'confirmed')->sum('amount');
        $totalDonors = User::whereHas('donations', function ($query) {
            $query->where('status', 'confirmed');
        })->count();

        // Get featured/active campaigns for homepage
        $campaigns = Campaign::where('status', 'active')
            ->withCount('donations')
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('home.index', compact(
            'totalCampaigns',
            'totalDonations',
            'totalDonors',
            'campaigns'
        ));
    }
    public function about()
    {
        //team kami hanya admin ambil dari role spatie tampilkan seperti name email
        $teamMembers = User::role('Admin')->get(['name', 'email']);
        // Get dynamic statistics for About page
        $totalCampaigns = Campaign::where('status', 'active')->count();
        $completedCampaigns = Campaign::where('status', 'completed')->count();
        $totalDonations = Donation::where('status', 'confirmed')->sum('amount');
        $totalDonors = User::whereHas('donations', function ($query) {
            $query->where('status', 'confirmed');
        })->count();
        $activeDonors = User::whereHas('donations', function ($query) {
            $query->where('status', 'confirmed')
                ->where('created_at', '>=', now()->subMonths(3));
        })->count();

        // Calculate people helped (estimate based on average help per campaign)
        $peopleHelped = $completedCampaigns * 20; // Rough estimate

        return view('home.about', compact(
            'totalCampaigns',
            'completedCampaigns',
            'totalDonations',
            'totalDonors',
            'activeDonors',
            'peopleHelped',
            'teamMembers'
        ));
    }
    public function contact()
    {
        // Get some basic stats for contact page
        $totalCampaigns = Campaign::where('status', 'active')->count();
        $totalUsers = User::count();
        $averageResponseTime = '2-4'; // Static for now, could be calculated from support tickets

        return view('home.contact', compact('totalCampaigns', 'totalUsers', 'averageResponseTime'));
    }
}
