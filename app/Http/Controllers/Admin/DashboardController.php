<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        $totalEmployees = User::where('role', 'employee')->count();
        $totalItems = Item::count();
        
        return view('admin.dashboard', compact('totalCustomers', 'totalEmployees', 'totalItems'));
    }
} 