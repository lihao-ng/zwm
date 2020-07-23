<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Client\TeamsServices;
use App\Models\Team;

class TeamsController extends Controller{

  protected $teamsServices;

  public function __construct(TeamsServices $teamsServices){
		$this->teamsServices = $teamsServices;
	}

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = '';
	

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    return $this->teamsServices->index($request);
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
    $team = Team::find($id);
    return $this->teamsServices->show($team);
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
    //
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

  public function getLatest(Request $request){
    return $this->teamsServices->getLatest($request);
  }

  public function search(Request $request){
		$key = $request->get('key');
		$teams = $this->teamsServices->searchTeams('name', $key);

		return $teams;
  }
  
}
