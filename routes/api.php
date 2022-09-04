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

Route::apiResource('players', \App\Http\Controllers\API\PlayerController::class, array("as" => "api"));
Route::get('filter-players/{nick}', 'App\Http\Controllers\API\PlayerController@getPlayers');
Route::get('filter-players/', function (){
    return [];
});

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

Route::post('countries', function (Request $request){
    $country = new Country();
    $country->name = $request->name;
    $country->logo_id = $request->logo_id;
    $country->save();
});
