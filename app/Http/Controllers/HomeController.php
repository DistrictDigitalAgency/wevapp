<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\userChart;
use App\Campaign;
use App\Question;
use App\User;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $userAmount= auth()->user()->amount;
        $launchedCampaigns = DB::table('campaigns')->count();
        $pendingCampaigns = Campaign::where('activeCampaign', 0)->get()->count();
        $runningCampaigns = Campaign::where('activeCampaign', 1)->get()->count();
        $finishedCampaigns = Campaign::where('activeCampaign', 2)->get()->count();


        $data=DB::table('questions')
            ->where([['questions.user_id', auth()->user()->id],['active', '=', '0']])
            ->join('campaigns','campaigns.id','=', 'questions.campaign_id')
            ->select('questions.*','campaigns.name')
            ->orderBy('nbAnswers', 'desc')
            ->get();


        //$userChart = new userChart();
        //$userChart->labels(['today', 'Two', 'Three']);
        //$campaignCreated






        return view('home')
            ->with('userAmount',$userAmount)
            ->with('pendingCampaigns',$pendingCampaigns)
            ->with('runningCampaigns',$runningCampaigns)
            ->with('finishedCampaigns',$finishedCampaigns)
            ->with('launchedCampaigns',$launchedCampaigns)
            ->with('questionDatas',$data);


        ;


    }

    public function myCampaigns()
    {
        return view('mycampaigns');
    }


    public function launchCampaign()
    {
        return view('launchCampaign');
    }



}
