<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
class DashboardController extends Controller
{
    public function index()
    {
        
            return view('donor.dashboard');
        
        
    }
}
