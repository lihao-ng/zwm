<?php

namespace App\Http\Controllers\Admin;

use App\Merchant;
use App\Services\Admin\MerchantServices;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantsController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'admin.merchant.';

	protected $merchantServices;

	public function __construct(MerchantServices $merchantServices){
		$this->merchantServices = $merchantServices;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->merchantServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Merchant $merchant){
		return view(self::PATH . 'edit', ['merchant' => (object) $this->merchantServices->transform($merchant)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Merchant $merchant){
    return $this->merchantServices->update($request, $merchant);
		// $imageFile = $request->image;

		// if($request->hasFile('image')){

		// 	$oldFileName = $player->avatar;
		// 	$oldFile = '/images/upload/' . $oldFileName;
		// 	Storage::disk('public')->delete($oldFile);

		// 	//get filename + extension
		// 	$fileNameWithExt = $request->file('image')->getClientOriginalName();
		// 	$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
		// 	$fileExtension = $request->file('image')->getClientOriginalExtension();

		// 	$fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

		// 	//upload image
		// 	$path = $request->file('image')->storeAs('public/images/upload', $fileNameToStore);

		// 	$player->avatar = $fileNameToStore;
		// }

		// $player->first_name = $data->first_name;
		// $player->last_name = $data->last_name;
		// // $player->password = Hash::make($request->password);
		// $player->birth_date = !empty($data->birth_date) ? $data->birth_date : null ;
		// $player->origin = $data->origin;
		// $player->region_id = $data->region_id;
		// $player->league_id = $data->league_id;
		// $player->qualification = !empty($data->qualification) ? $data->qualification : '';
		// $player->rank = !empty($data->rank) ? $data->rank : '';
		// $player->position = !empty($data->position) ? $data->position : '';
		// // $player->team_id = $data->team_id;
		// $player->experience = !empty($data->experience) ? $data->experience : ' ';
		// $player->description = !empty($data->description) ? $data->description : '';
		// $player->history = $data->history;
		// $player->is_featured = !empty($data->is_featured) ? 1 : 0 ;

		// $this->statisticServices->store_or_update($data->statistic);


		// $player->teams()->detach();

		// if( !empty($data->player_teams) ){

		// 	foreach($data->player_teams as $sTeam){

		// 		$tTeam = Team::where('name', $sTeam->pivot->team_name)->first();

		// 		if(!empty($tTeam)){
		// 			$newPlayerTeam = new PlayerTeam;
		// 			$newPlayerTeam->team_id = $tTeam->id;
		// 		}
		// 		else{
		// 			$newTeam = new Team;
		// 			$newTeam->name = $sTeam->pivot->team_name;
		// 			$newTeam->save();

		// 			$newTeam2 = Team::where('name', $sTeam->pivot->team_name)->first();
					
		// 			$newPlayerTeam = new PlayerTeam;
		// 			$newPlayerTeam->team_id = $newTeam2->id;
		// 		}

		// 		$newPlayerTeam->player_id = $player->id;
		// 		$newPlayerTeam->year_start = !empty($sTeam->pivot->year_start) ? $sTeam->pivot->year_start : null;
		// 		$newPlayerTeam->year_end = !empty($sTeam->pivot->year_end) ? $sTeam->pivot->year_end : null;
		// 		$newPlayerTeam->team_name = $sTeam->pivot->team_name;

		// 		$newPlayerTeam->save();
		// 	}
		// }

		// $player->save();

		// Session::flash('success','Player has been updated successfully!');

		// return;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Merchant $merchant){
    $merchant->delete();
    
		return success();
	}
}
