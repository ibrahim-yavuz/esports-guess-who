<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/logos', function (){
    return \App\Models\Logo::all();
});


Route::post('/olustur', function (Request $request){
    $file_name = $request->file('logo')->getClientOriginalName();
    $type = $request->type;
    $uploaded_path = 'logos/'.$type."/";
    $request->file('logo')->storeAs("public/".$uploaded_path, $file_name);

    $full_path_of_logo = asset("storage/".$uploaded_path.$file_name);
    $logo = new \App\Models\Logo();
    $logo->logo_url = $full_path_of_logo;
    $logo->save();
});

Route::post('/ulke-olustur', function (Request $request){
    $country = new \App\Models\Country();
    $country->name = $request->name;
    $country->logo_id = $request->logo_id;
    $country->save();
});

Route::post('player-olustur', function (Request $request){
    $player = new \App\Models\Player();
    $player->nick = $request->nick;
    $player->name = $request->name;
    $player->birth_date = $request->birth_date;
    $player->country_id = $request->country_id;
    $player->team_id = $request->team_id;
    $player->game_id = 1;
    $player->mvp_count = 0;
    $player->won_tournament_count = 0;
    $player->save();
});
