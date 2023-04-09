<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationApplication;
use Auth;
use Session;

class VerificationApplicationController extends Controller
{
    public function index(){
        
        return view('admin.verification_applications.index');
    }

    public function getIndexData(){
        $applications = VerificationApplication::with('user');
        return datatables()
        ->of($applications)
            ->addColumn('action', 'admin.verification_applications.index-buttons')
            ->toJson();
    }

    public function viewApplication($id){
        $application = VerificationApplication::find($id);
        return view('admin.verification_applications.view', compact('application'));
        
    }
}
