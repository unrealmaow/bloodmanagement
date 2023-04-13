<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BloodGroup;
use App\Models\DonationRequest;
use Auth;
use Session;
use Str;

class DonationRequestController extends Controller
{
    public function index(){
        return view('admin.donations.index');
    }

    public function getIndexData(){
        $donations = DonationRequest::with(['user', 'bloodgroup']);
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
                return '<span class="badge bg-primary-gradient badge-sm  me-1 mb-1 mt-1">Processed</span>';
            }else{
                return '<span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">Not Processed Yet</span>';
            }
        })
        ->editColumn('verified_by', function($donation){
            
            return $donation->verified_by == null ? '<span class="text-danger">Not Processed Yet.</span>' : '<span class="text-success">'.User::find($donation->verified_by)->name.'</span>';
        })
        ->editColumn('donor_id', function($donation){
            
            return $donation->donor_id == null ? '<span class="text-danger">Not Assigned Yet.</span>' : '<span class="text-success">'.User::find($donation->donor_id)->name.'</span>';
        })
        
        ->addColumn('action', 'admin.donations.index-buttons')
        ->rawColumns(['action', 'status', 'verified_by', 'isVerifiedByAdmin', 'donor_id'])
        ->toJson();
    }

    public function viewRequest($id){
        $donation = DonationRequest::find($id);
        return view('admin.donations.view', compact('donation'));
    }

    public function rejectApplication($id){
        $donation = DonationRequest::find($id);
        $donation->isVerifiedByAdmin = true;
        $donation->verified_by = Auth::user()->id;
        $donation->status = "rejected";
        $donation->save();

        Session::flash('success', __('messages.donation_request_rejected'));
        return redirect(route('admin.donation.requests'));
    }

    public function acceptApplication($id){

        $donation = DonationRequest::find($id);
        $donation->isVerifiedByAdmin = true;
        $donation->verified_by = Auth::user()->id;
        $donation->status = "pending";
        $donation->save();

        Session::flash('success', __('messages.donation_request_accepted'));
        return redirect(route('admin.donation.requests'));

    }
}
