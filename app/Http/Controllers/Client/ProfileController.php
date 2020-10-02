<?php

namespace App\Http\Controllers\Client;

use App\Merchant;

use App\Services\ImageLibraryService;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileController extends Controller{
  protected $path = 'client.';
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

	// display admin profile
	public function profile(){
    $merchant = current_user()->merchant;
    $merchant->setAttribute('email', current_user()->email);

		return view($this->path . 'profile.edit', ['merchant' => $merchant]);
	}

	public function update(Request $request, Merchant $merchant){
		$request->validate([
      'category' => 'required',
			'name' => 'required',
			'description' => 'required',
      'address' => 'required',
      'lat' => 'required',
      'lng' => 'required',
			'business_hours' => 'required',
      'contact' => 'required',
      'link' => 'required',
      'other_information' => 'required',
      'photo' => 'nullable|image|max:2000',
    ]);

    if(!$merchant->photo && !$request->photo) {
      return redirect()->back()->withInput()->withErrors('The photo field is required.');
    }
    
    $merchant->name = $request->name;
    $merchant->category = $request->category;
    $merchant->description = $request->description;
    $merchant->contact = $request->contact;
    $merchant->address = $request->address;
    $merchant->lat = $request->lat;
    $merchant->lng = $request->lng;
    $merchant->business_hours = $request->business_hours;
    $merchant->link = $request->link;
    $merchant->other_information = $request->other_information;
    $merchant->approved = 0;

    $photoName = $this->imageLibraryService->update($request->file('photo'), $merchant->photo, 'merchants');

    $merchant->photo = $photoName;
		$merchant->save();

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
