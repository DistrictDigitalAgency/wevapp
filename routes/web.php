<?php

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
    return view('welcome');
});

Auth::routes();




//Clients routes
Route::get('/dashboard', [
    'uses' => 'HomeController@index',
    'as' => 'dashboard'
]);

Route::get('/dashboard/my_campaigns', [
    'uses' => 'CampaignController@index',
    'as' => 'my_campaigns'
]);

Route::get('/dashboard/new_campaign', [
    'uses' => 'HomeController@launchCampaign',
    'as' => 'launch_campaign'
]);

Route::post('/dashboard/campaign/create', [
    'uses' => 'CampaignController@store',
    'as' => 'campaign.store'
]);


Route::get('/dashboard/campaign/details/{id}', [
    'uses' => 'CampaignController@show',
    'as' => 'campaign.detail'
]);



//Admin routes

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/', [
        'uses' => 'AdminController@index',
        'as' => 'admin.statistics'
    ]);


    Route::post('/wevo/add_question', [
        'uses' => 'AdminController@addQuestion',
        'as' => 'admin.addQuestion'
    ]);

    Route::get('/wevo/add_question', [
        'uses' => 'AdminController@addQuestionView',
        'as' => 'admin.addQuestionView'
    ]);
    Route::get('/wevo/questions_list', [
        'uses' => 'AdminController@questionList',
        'as' => 'admin.questionList'
    ]);


    Route::get('/wevo/question_details/{id}', [
        'uses' => 'AdminController@questionDetails',
        'as' => 'admin.question.detail'
    ]);


    Route::get('/wevo/clients_statistics', [
        'uses' => 'AdminController@clientStats',
        'as' => 'admin.clientStats'
    ]);

    Route::get('/wevo/clients_list', [
        'uses' => 'AdminController@clientList',
        'as' => 'admin.clientList'
    ]);

    Route::get('/wevo/clients_campaigns', [
        'uses' => 'AdminController@launchedCampaigns',
        'as' => 'admin.launchedCampaigns'
    ]);

    Route::get('/wevo/question_suggestions', [
        'uses' => 'AdminController@questionSuggestions',
        'as' => 'admin.questionSuggestions'
    ]);

    Route::get('/wevo/messages_request', [
        'uses' => 'AdminController@msgRequests',
        'as' => 'admin.msgRequests'
    ]);


    Route::get('/wevo/clients_campaigns/campaign/{id}', [
        'uses' => 'AdminController@campaignDetail',
        'as' => 'campaign.show'
    ]);

    Route::post('/wevo/clients_campaigns/confirm/{id}', [
        'uses' => 'AdminController@confirm',
        'as' => 'campaign.confirm'
    ]);

    Route::get('/wevo/clients_list/client/{id}', [
        'uses' => 'AdminController@clientDetail',
        'as' => 'admin.client.detail'
    ]);


});