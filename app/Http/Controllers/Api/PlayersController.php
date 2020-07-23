<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Client\PlayersServices;
use App\Services\Shared\StatisticServices;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Player;
use App\Models\Team;
use App\Models\PlayerTeam;
use Validator;
use Session;

class PlayersController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
  public const PATH = '';

  protected $playersServices, $statisticServices;

  
  public function __construct(PlayersServices $playersServices, StatisticServices $statisticServices){
    $this->playersServices = $playersServices;
    $this->statisticServices = $statisticServices;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    //
    return $this->playersServices->index($request);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id){
    $player = Player::find($id);
    return $this->playersServices->show($player);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id){
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id){

		$imageFile = $request->image;
		$data = json_decode($request->data);
		$data_validation = json_decode($request->data, true);


		$validator = Validator::make(
			$data_validation, [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'origin' => 'required|max:255',
			'history' => 'required|max:300',
			'description' => 'max:300',
			'qualification' => 'max:255',
			'rank' => 'max:255',
			'position' => 'max:255',
			'experience' => 'max:255',
			]
		);
		if ($validator->fails()) {
      $message = $validator->messages();
      Session::flash('error', $message->first());
      return;
    }

		$player = Player::find($id);

		if($request->hasFile('image')){

			$oldFileName = $player->avatar;
			$oldFile = '/images/upload/' . $oldFileName;
			Storage::disk('public')->delete($oldFile);

			//get filename + extension
			$fileNameWithExt = $request->file('image')->getClientOriginalName();
			$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
			$fileExtension = $request->file('image')->getClientOriginalExtension();
			$fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

			//upload image
      $path = $request->file('image')->storeAs('public/images/upload', $fileNameToStore);
      
			$player->avatar = $fileNameToStore;
		}

		$player->first_name = $data->first_name;
		$player->last_name = $data->last_name;
		// $player->password = Hash::make($request->password);
		$player->birth_date = !empty($data->birth_date) ? $data->birth_date : null ;
		$player->origin = $data->origin;
		$player->region_id = $data->region_id;
		$player->league_id = $data->league_id;
		$player->qualification = !empty($data->qualification) ? $data->qualification : '';
		$player->rank = !empty($data->rank) ? $data->rank : '';
		$player->position = !empty($data->position) ? $data->position : '';
		// $player->team_id = $data->team_id;
		$player->experience = !empty($data->experience) ? $data->experience : ' ';
		$player->description = !empty($data->description) ? $data->description : '';
		$player->history = $data->history;
		$player->is_featured = !empty($data->is_featured) ? 1 : 0 ;

		$this->statisticServices->store_or_update($data->statistic);

		$player->teams()->detach();

		if( !empty($data->player_teams) ){

			foreach($data->player_teams as $sTeam){

				$tTeam = Team::where('name', $sTeam->pivot->team_name)->first();

				if(!empty($tTeam)){
					$newPlayerTeam = new PlayerTeam;
					$newPlayerTeam->team_id = $tTeam->id;
				}
				else{
					$newTeam = new Team;
					$newTeam->name = $sTeam->pivot->team_name;
					$newTeam->save();

					$newTeam2 = Team::where('name', $sTeam->pivot->team_name)->first();
					
					$newPlayerTeam = new PlayerTeam;
					$newPlayerTeam->team_id = $newTeam2->id;
				}

				$newPlayerTeam->player_id = $player->id;
				$newPlayerTeam->year_start = !empty($sTeam->pivot->year_start) ? $sTeam->pivot->year_start : null;
				$newPlayerTeam->year_end = !empty($sTeam->pivot->year_end) ? $sTeam->pivot->year_end : null;
				$newPlayerTeam->team_name = $sTeam->pivot->team_name;

				$newPlayerTeam->save();
			}
		}

		$player->save();

		Session::flash('success','Player has been updated successfully!');

		return;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){
    //
  }

  public function getFeatured(Request $request){
    return $this->playersServices->getFeatured($request);
  }

  public function getReviewPlayers(){

    $goalKeeperKey = "goalkeeper";
    $strikerKey = "striker";
    $midfielderKey = "midfielder";

    $goalKeeper = Player::where('is_verified', 1)->where('position', 'like', "%{$goalKeeperKey}%")->get()->last();
    $striker = Player::where('is_verified', 1)->where('position', 'like', "%{$strikerKey}%")->get()->last();
    $midfielder = Player::where('is_verified', 1)->where('position', 'like', "%{$midfielderKey}%")->get()->last();
    
    $newPlayers = [];
    
    $players = [
      $goalKeeper,
      $striker,
      $midfielder
    ];

    foreach ($players as $player){
      if( !empty($player) ){
        $newPlayers[] = $player;
      }
    }

    return $newPlayers;
  }

  public function changePassword(Request $request, Player $player){

    $request->validate(array(
			'currentPassword' => 'required',
      'newPassword' => 'required|min:6',
      'confirmPassword' => 'required|min:6',
    ));

    if (!(Hash::check($request->get('currentPassword'), $player->password))) {
      // The passwords do not match
      return validation_error("Your current password does not match with the password you provided. Please try again.");
    }

    if((Hash::check($request->get('newPassword'), $player->password))){
      //Current password and new password are same
      return validation_error("New password cannot be the same as your current password. Please choose a different password.");
    }
		
    //Change Password
    $player->password = Hash::make($request->get('newPassword'));
    $player->save();

    return success("Password changed successfully!");
  }
}
