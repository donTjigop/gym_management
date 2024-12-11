<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Trainer;
use App\Models\Payment;
use App\Models\Subscription;

class DashboardController extends Controller
{
    /**
     * Show the gym dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch data from models
        $totalMembers = Member::count();
        $totalIncome = Payment::sum('amount'); // Sum of all payments
        $totalTrainers = Trainer::count();
        $totalSubscriptions = Subscription::where('status', 'active')->count();

        // Pass data to the view
        return view('dashboard', compact('totalIncome', 'totalMembers', 'totalTrainers', 'totalSubscriptions'));
    }

    /**
     * Fetch dashboard statistics for AJAX updates.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchStats()
    {
        return response()->json([
            'totalMembers' => Member::count(),
            'totalIncome' => Payment::sum('amount'),
            'totalTrainers' => Trainer::count(),
            'totalSubscriptions' => Subscription::where('status', 'active')->count(),
        ]);
    }
}
