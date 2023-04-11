<?php

namespace App\Http\Controllers\Receiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodGroup;
use App\Models\DonationRequest;
use Auth;
use Session;
class DonationRequestController extends Controller
{
    public function requestNew(){
        $blood_groups = BloodGroup::all();
        return view('receiver.donations.request_new', compact('blood_groups'));
    }

    public function storeRequest(Request $request){
       
        $request->validate([
            'blood_group' => ['required'],
            'case_details' => ['required', 'min:10', 'max:1500'],
            'case_proof' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $file = $request->file('case_proof');
        $filename = Auth::user()->id . '_case_proof_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $filename);

        DonationRequest::create([
            'user_id' => Auth::user()->id,
            'bloodgroup_id' => $request->blood_group,
            'status' => 'pending',
            'case_details' => $request->case_details,
            'proof_pic_path' => $path
        ]);

        Session::flash('success', __('messages.donation_request_placed'));
        return back();
    }
}
