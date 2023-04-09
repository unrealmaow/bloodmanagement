<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use App\Models\VerificationApplication;


class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        
        return view("admin.edit_profile", compact('user'));
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
