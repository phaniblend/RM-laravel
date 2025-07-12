<?php
namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurant = auth()->user()->restaurant;

                           // Get today's stats
        $todayRevenue = 0; // We'll implement orders later
        $todayOrders  = 0;

        // For now, just count all staff (we'll add last login tracking later)
        $activeStaff = User::where('restaurant_id', $restaurant->id)->count();
        $totalStaff  = User::where('restaurant_id', $restaurant->id)->count();

                                // Get recent activities
        $recentActivities = []; // We'll implement this later

        return view('owner.dashboard', compact(
            'restaurant',
            'todayRevenue',
            'todayOrders',
            'activeStaff',
            'totalStaff',
            'recentActivities'
        ));
    }
}
