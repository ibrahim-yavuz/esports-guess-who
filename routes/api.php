<?php

use App\Models\Country;
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

Route::apiResource('players', \App\Http\Controllers\API\PlayerController::class)->middleware(['auth:sanctum', 'cors']);
Route::get('/', function () {
    $dailyPlayer = \App\Models\DailyPlayer::latest()->first();
    if($dailyPlayer == null){
        return "Couldn' find Player";
    }
    return \App\Models\Player::with('country.logo', 'team.logo', 'roles', 'game', 'logo')->find($dailyPlayer->player_id);
})->middleware(['auth:sanctum', 'cors']);

//Route::put('update-roles/{id}', function(Request $request, $id){
//    $player = \App\Models\Player::find($id);
//    $player->roles()->sync($request->roles);
//    $player->save();
//});
//
//
//Route::post('/tokens/create', function (Request $request) {
//    $token = \App\Models\User::first()->createToken($request->token_name);
//
//    return ['token' => $token->plainTextToken];
//});

//Update functions
//Route::get('update-logos', function (){
//    $logos = \App\Models\Logo::all();
//    foreach ($logos as $logo){
//        $logo->logo_url = str_replace( 'https://www.esportsguesswho.com', 'http://127.0.0.1:8000',$logo->logo_url);
//        $logo->save();
//    }
//});


//Add functions

//Route::post('upload-image', function (Request $request){
//    $file_name = $request->file('logo')->getClientOriginalName();
//    $type = $request->type;
//    $uploaded_path = 'logos/'.$type."/";
//    $request->file('logo')->storeAs("public/".$uploaded_path, $file_name);
//
//    $full_path_of_logo = asset("storage/".$uploaded_path.$file_name);
//    $logo = new \App\Models\Logo();
//    $logo->logo_url = $full_path_of_logo;
//    $logo->save();
//});
//
//Route::post('countries', function (Request $request){
//    $country = new Country();
//    $country->name = $request->name;
//    $country->logo_id = $request->logo_id;
//    $country->save();
//});
//
//Route::post('teams', function (Request $request){
//    $team = new \App\Models\Team();
//    $team->name = $request->name;
//    $team->country_id = $request->country_id;
//    $team->logo_id = $request->logo_id;
//    $team->save();
//});
//
//Route::post('players', function (Request $request){
//    $player = new \App\Models\Player();
//    $player->nick = $request->nick;
//    $player->name = $request->name;
//    $player->birth_date = $request->birth_date;
//    $player->logo_id = $request->logo_id;
//    $player->country_id = $request->country_id;
//    $player->team_id = $request->team_id;
//    $player->game_id = 1;
//    $player->mvp_count = $request->mvp_count;
//    $player->won_tournament_count = $request->won_tournament_count;
//    $player->save();
//});
