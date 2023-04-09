<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationApplication;
use Auth;
use Session;

class VerificationApplicationController extends Controller
{
    public function save(Request $request){
        $request->validate([
            'cnic_num' => ['required', 'string', 'max:25', 'unique:'.VerificationApplication::class],
            'cnic_pic' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $file = $request->file('cnic_pic');
        $filename = Auth::user()->id . '_cnic_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $filename);
        

        VerificationApplication::create([
            'user_id' => Auth::user()->id,
            'applicant_type' => Auth::user()->role,
            'status' => 'pending',
            'cnic_num' => $request->cnic_num,
            'cnic_pic_path' => $path
        ]);

        Session::flash('success', __('messages.verification_application_applied'));
        return back();
    }
}
