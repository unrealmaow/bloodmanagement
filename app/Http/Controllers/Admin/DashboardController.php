<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VerificationApplication;
use App\Models\User;
use Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
            
            $total_donors = User::where('role', 'donor')->count();
            $total_receivers = User::where('role', 'receiver')->count();
            return view('admin.dashboard', compact('total_receivers', 'total_donors'));
        
        
    }


    public function dummy()
    {
            
            $total_donors = User::where('role', 'donor')->count();
            $total_receivers = User::where('role', 'receiver')->count();
            return view('admin.dummy', compact('total_receivers', 'total_donors'));
        
        
    }
}
