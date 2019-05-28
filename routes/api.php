<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/apiV1_0/login', 'API\UserController@login');
Route::post('/apiV1_0/register', 'API\UserController@register');


Route::get('/apiV1_0', 'API\UserController@index');
Route::get('/apiV1_0/getQuestionsByCategoryID', 'API\UserController@getQuestionsByCategoryID');
Route::post('/apiV1_0/addVoteToAnswer', 'API\UserController@addVoteToAnswer');
Route::post('/apiV1_0/registerUser', 'API\UserController@registerUser');
Route::get('/apiV1_0/getStatistics', 'API\UserController@getStatistics');




Route::group(['/middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');

});