<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use App\Models\VerificationApplication;
use App\Models\BloodGroup;
use App\Models\City;


class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        $application_status = 'none';
        if(VerificationApplication::where('user_id', Auth::user()->id)->exists()){
            $application_status = VerificationApplication::where('user_id', Auth::user()->id)->first()->status;
        }
        $blood_groups = BloodGroup::all();
        $cities = City::all();
        return view("donor.edit_profile", compact('user', 'application_status', 'blood_groups', 'cities'));
    }

    public function update(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'phone' => ['required', 'string', 'min:11', 'max:11', Rule::unique('users')->ignore(Auth::user()->id, 'id')],
        ]);

        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        $user->phone = $request->phone;
        // if(!(string)$request->phone == (string)Auth::user()->phone){
        //     $user->phone = $request->phone;
        // }
        $user->save();

        Session::flash('success', __('messages.profile_updated'));

        return back();

        
    }
}
