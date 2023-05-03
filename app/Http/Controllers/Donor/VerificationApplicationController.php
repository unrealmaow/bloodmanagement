<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationApplication;
use App\Models\BloodGroup;
use Auth;
use Session;

class VerificationApplicationController extends Controller
{
    public function save(Request $request){
        
        $request->validate([
            'cnic_num' => ['required', 'string', 'min:15', 'max:15', 'unique:'.VerificationApplication::class],
            'cnic_pic' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
            'bg_certificate' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
            'blood_group' => ['required'],
            'city' => ['required'],
        ]);

        

        $file = $request->file('cnic_pic');
        $filename = Auth::user()->id . '_cnic_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $filename);

        $file2 = $request->file('bg_certificate');
        $filename2 = Auth::user()->id . '_bg_certificate_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path2 = $file2->storeAs('uploads', $filename2);
        

        VerificationApplication::create([
            'user_id' => Auth::user()->id,
            'applicant_type' => Auth::user()->role,
            'status' => 'pending',
            'cnic_num' => $request->cnic_num,
            'cnic_pic_path' => $path,
            'bloodgroup_id' => $request->blood_group,
            'bloodgroup_pic_path' => $path2,
            'city_id' => $request->city
        ]);

        Session::flash('success', __('messages.verification_application_applied'));
        return back();
    }
}
