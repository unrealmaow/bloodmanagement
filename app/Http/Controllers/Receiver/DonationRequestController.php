<?php

namespace App\Http\Controllers\Receiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodGroup;
use App\Models\DonationRequest;
use Auth;
use Session;
use Str;

class DonationRequestController extends Controller
{

    public function index(){
        return view('receiver.donations.index');
    }

    public function getIndexData(){
        $donations = DonationRequest::with(['bloodgroup'])->where('user_id', Auth::user()->id)->get();
        return datatables()
        ->of($donations)
        ->editColumn('status', function($donation){
            
            if($donation->status == "completed"){
                return '<span class="badge bg-primary-gradient badge-sm  me-1 mb-1 mt-1">'.Str::title($donation->status).'</span>';
            }elseif($donation->status == "rejected"){
                return '<span class="badge bg-danger-gradient badge-sm  me-1 mb-1 mt-1">'.Str::title($donation->status).'</span>';
            }else{
                return '<span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">'.Str::title($donation->status).'</span>';
            }
        })
        ->editColumn('isVerifiedByAdmin', function($donation){
            
            if($donation->isVerifiedByAdmin == true){
                return '<span class="badge bg-primary-gradient badge-sm  me-1 mb-1 mt-1">Verified</span>';
            }else{
                return '<span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">Not Verified Yet</span>';
            }
        })
        ->addColumn('action', 'receiver.donations.index-buttons')
        ->rawColumns(['action', 'status', 'isVerifiedByAdmin'])
        ->toJson();
    }

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
            'city_id' => Auth::user()->city_id,
            'status' => 'pending',
            'case_details' => $request->case_details,
            'proof_pic_path' => $path
        ]);

        Session::flash('success', __('messages.donation_request_placed'));
        return redirect(route('receiver.donations.list'));
    }
}
