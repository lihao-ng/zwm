<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileController extends Controller{

  protected $path = 'admin.';
  
	// display admin profile
	public function profile(){
		return view($this->path . 'profile.edit');
	}

	// update profile details
	public function update(Request $request){
		$request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
		]);

		$admin = current_user();

		$admin->first_name = $request->first_name;
		$admin->last_name = $request->last_name;

		$admin->save();


		return redirect()->back()->with(['success' => 'Profile details has been updated successfully!']);
	}

	// change password
	public function changePassword(Request $request){
		$admin = current_user();

    if (!(Hash::check($request->get('current_password'), $admin->password))) {
        // The passwords do not match
      return redirect()->back()->with("error", "Your current password does not match with the password you provided. Please try again.");
    }

    if(strcmp($request->get('current_password'), $request->get('password')) == 0){
        //Current password and new password are same
      return redirect()->back()->with("error", "New password cannot be the same as your current password. Please choose a different password.");
    }

		$request->validate(array(
			'current_password' => 'required',
      'password' => 'required|min:6|confirmed',
    ));

    //Change Password
    $admin->password = bcrypt($request->get('password'));
    $admin->save();

    return redirect()->back()->with("success", "Password changed successfully!");
	}
}
