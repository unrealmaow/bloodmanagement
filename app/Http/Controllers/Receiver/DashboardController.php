<?php

namespace App\Http\Controllers\Receiver;

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
            $flag = VerificationApplication::where('user_id', Auth::user()->id)->exists();
            $verification_status = "Not Verified";
            if($flag){
                //application exists
                $verification_status = VerificationApplication::where('user_id', Auth::user()->id)->first()->status;
            }

            $verification_status =  Str::title($verification_status);
            return view('receiver.dashboard', compact('verification_status'));
        
        
    }
}
