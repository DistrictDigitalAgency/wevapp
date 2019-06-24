<?php


use App\Mail\ContactMail;
use Illuminate\Http\Request;

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

Route::get('/dashboard/deposit', [
    'uses' => 'CampaignController@deposit',
    'as' => 'client.deposit'
]);

Route::get('/dashboard/about_us', [
    'uses' => 'CampaignController@aboutus',
    'as' => 'client.aboutus'
]);

Route::get('/dashboard/terms_and_conditions', [
    'uses' => 'CampaignController@termsandconditions',
    'as' => 'client.terms'
]);

Route::get('/dashboard/contact_us', [
    'uses' => 'CampaignController@contact',
    'as' => 'client.contact'
]);

Route::post('/dashboard/contact_us/send', function (Request $request){
    //dd($request);
    Mail::send(new ContactMail($request));
    return redirect()->route('client.contact');

},['as'=>'client.sendMail']);


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



    //Partners management

    Route::get('/wevo/partners', [
        'uses' => 'AdminController@partnersList',
        'as' => 'admin.partners.show'
    ]);

    Route::get('/wevo/partners/add', [
        'uses' => 'AdminController@partnersAddForm',
        'as' => 'admin.partners.add'
    ]);

    Route::post('/wevo/partners/add/save', [
        'uses' => 'AdminController@addPartner',
        'as' => 'admin.addPartner'
    ]);

    Route::get('/wevo/partners/delete', [
        'uses' => 'AdminController@partnersDelete',
        'as' => 'admin.partners.delete'
    ]);

    Route::get('/wevo/partners/edit', [
        'uses' => 'AdminController@partnersEdit',
        'as' => 'admin.partners.edit'
    ]);

    Route::post('/wevo/partners/edit/save', [
        'uses' => 'AdminController@partnersEditsubmitted',
        'as' => 'admin.partners.edit.submit'
    ]);

});