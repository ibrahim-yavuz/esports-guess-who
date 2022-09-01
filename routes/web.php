<?php

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $dailyPlayer = \App\Models\DailyPlayer::latest()->first();
    return Player::with('country.logo', 'team.logo', 'roles', 'game', 'logo')->find($dailyPlayer->player_id);
});

Route::resource('players', \App\Http\Controllers\PlayerController::class);
Route::resource('countries', \App\Http\Controllers\CountryController::class);
Route::resource('teams', \App\Http\Controllers\TeamController::class);
Route::resource('games', \App\Http\Controllers\GameController::class);


//Route::get('upload-image-form', function (){
//    return view('upload_image');
//});
////
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
