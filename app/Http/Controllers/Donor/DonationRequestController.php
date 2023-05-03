<?php

namespace App\Http\Controllers\Donor;

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
        
        return view('donor.donations.list');
    }


    public function getIndexData(){
        $donations = DonationRequest::with(['bloodgroup', 'user'])->where('status', "pending")->where('donor_id', NULL)->where('isVerifiedByAdmin', true)->where('bloodgroup_id', Auth::user()->bloodgroup_id)->where('city_id', Auth::user()->city_id)->get();
        return datatables()
        ->of($donations)
        ->editColumn('isVerifiedByAdmin', function($donation){
            
            if($donation->isVerifiedByAdmin == true){
                return '<span class="badge bg-primary-gradient badge-sm  me-1 mb-1 mt-1">Verified</span>';
            }else{
                return '<span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">Not Verified Yet</span>';
            }
        })
        ->addColumn('action', 'donor.donations.index-buttons')
        ->rawColumns(['action', 'isVerifiedByAdmin'])
        ->toJson();
    }

    public function acceptDonationRequest($id){
        $donation = DonationRequest::find($id);
        $donation->donor_id = Auth::user()->id;
        $donation->status = "completed";
        $donation->save(); 

        Session::flash('success', __('messages.donation_request_accepted_by_donor'));
        return redirect(route('donor.donations.accepted_requests_list'));
    }


    public function acceptedRequestList(){
        return view('donor.donations.accepted.list');
    }

    public function getAcceptedIndexData(){

        $donations = DonationRequest::with(['bloodgroup', 'user'])->where('status', "completed")->where('donor_id', Auth::user()->id)->get();
        return datatables()
        ->of($donations)
        ->editColumn('isVerifiedByAdmin', function($donation){
            
            if($donation->isVerifiedByAdmin == true){
                return '<span class="badge bg-primary-gradient badge-sm  me-1 mb-1 mt-1">Verified</span>';
            }else{
                return '<span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">Not Verified Yet</span>';
            }
        })
        ->addColumn('case_details_modal', 'donor.donations.partials.case_details')
        ->rawColumns(['case_details_modal', 'isVerifiedByAdmin'])
        ->toJson();

    }


}
