<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationApplication;
use Auth;
use Session;
use Str;

class VerificationApplicationController extends Controller
{
    public function index(){
        
        return view('admin.verification_applications.index');
    }

    public function getIndexData(){
        $applications = VerificationApplication::with('user');
        return datatables()
        ->of($applications)
        ->editColumn('status', function($application){
            
            if($application->status == "approved"){
                return '<span class="badge bg-primary-gradient badge-sm  me-1 mb-1 mt-1">'.Str::title($application->status).'</span>';
            }elseif($application->status == "rejected"){
                return '<span class="badge bg-danger-gradient badge-sm  me-1 mb-1 mt-1">'.Str::title($application->status).'</span>';
            }else{
                return '<span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">'.Str::title($application->status).'</span>';
            }
        })
        ->editColumn('approved_by', function($application){
                return $application->approved_by == null ? '<span class="text text-danger">Not Processed Yet.</span>' : '<span class="text text-success">'.User::find($application->approved_by)->name.'</span>';
        })
        ->addColumn('action', 'admin.verification_applications.index-buttons')
        ->rawColumns(['action', 'approved_by', 'status'])
        ->toJson();
    }

    public function viewApplication($id){
        $application = VerificationApplication::find($id);
        return view('admin.verification_applications.view', compact('application'));
        
    }

    public function rejectApplication($id){
        $application = VerificationApplication::find($id);
        $application->approved_by = Auth::user()->id;
        $application->status = "rejected";
        $application->save();

        $user = User::find($application->user_id);
        $user->verification = "not_verified";
        $user->save();

        Session::flash('success', __('messages.saved_successfully'));
        return redirect(route('admin.verification.applications'));
    }

    public function acceptApplication($id){

        $application = VerificationApplication::find($id);
        $application->approved_by = Auth::user()->id;
        $application->status = "approved";
        $application->save();

        $user = User::find($application->user_id);
        $user->bloodgroup_id = $application->bloodgroup_id;
        $user->verification = "verified";
        $user->save();

        Session::flash('success', __('messages.saved_successfully'));
        return redirect(route('admin.verification.applications'));
    }


    public function deleteApplication($id){

        VerificationApplication::destroy($id);

        Session::flash('success', __('messages.verification_applicated_deleted'));
        return redirect(route('admin.verification.applications'));
    }
    
}
