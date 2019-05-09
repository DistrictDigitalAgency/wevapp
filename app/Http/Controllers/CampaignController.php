<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Question;
use App\User;
use phpDocumentor\Reflection\Types\String_;
use Session;
use App\Charts\questionChart;
use DateTime;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns=Campaign::where('user_id', auth()->user()->id)
                             ->orderBy('created_at', 'desc')
                             ->get();
        return view('mycampaigns')->with('campaigns',$campaigns);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        //Get the total amount from questions

         $totalAmount = (int)$request->questionPrice0
                         + (int) $request->questionPrice1
                         + (int) $request->questionPrice2
                         + (int) $request->questionPrice3
                         + (int) $request->questionPrice4
                         + (int) $request->questionPrice5
                         + (int) $request->questionPrice6
                         + (int) $request->questionPrice7
                         + (int) $request->questionPrice8
                         + (int) $request->questionPrice9
                         + (int) $request->questionPrice10;




        $user_amount = auth()->user()->amount;



        //dd($request->all());

            if($totalAmount>$user_amount){
                Session::flash('error','Your amount is insufficient. ');
                return redirect()->route('my_campaigns');
            }else{

                //get number of days
                $datetime1 = new DateTime($request->finishDate);
                $datetime2 = new DateTime($request->startDate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');

                $campaign = new Campaign();
                $campaign->user_id = auth()->user()->id;
                $campaign->name = $request->inputCampaignName;
                $campaign->objectives = $request->inputCampaignObjective;
                $campaign->desiredAgeMin = $request->minAge;
                $campaign->desiredAgeMax = $request->maxAge;
                $campaign->finishDate = $request->finishDate;
                $campaign->startDate = $request->startDate;
                $campaign->nbOfDays = $days+1;
                $campaign->questionsTotalAmount = $totalAmount;
                $campaign->desiredSexe = $request->sexeType;
                $campaign->nbQuestions=$request->nbQuestion;
                $campaign->activeCampaign=0;
                $campaign->save();


                for($i = 0;$i<($campaign->nbQuestions);$i++)
                {
                    $question = new Question();
                    //$question->category_id = 1;
                    $question->campaign_id = $campaign->id;
                    $question->user_id = auth()->user()->id;
                    $question->startDate = $request->startDate;
                    $question->finishDate = $request->finishDate;
                    $question->active = 0;
                    $question->category_id = 2;



                   if ($i==0) {
                        $question->content = $request->questionContent0;
                        $question->pointAmount = (int) (($request->questionPrice0/100)*20);
                        $question->answer1 = $request->answer10;
                        $question->answer2 = $request->answer20;
                        $question->answer3 = $request->answer30;
                        $question->answer4 = $request->answer40;

                        $question->save();

                    }else if ($i==1) {
                        $question->content = $request->questionContent1;
                        $question->pointAmount = (int) (($request->questionPrice1/100)*20);
                       $question->answer1 = $request->answer11;
                       $question->answer2 = $request->answer21;
                       $question->answer3 = $request->answer31;
                       $question->answer4 = $request->answer41;
                        $question->save();


                    }else if ($i==2) {
                        $question->content = $request->questionContent2;
                        $question->pointAmount = (int) (($request->questionPrice2/100)*20);
                       $question->answer1 = $request->answer12;
                       $question->answer2 = $request->answer22;
                       $question->answer3 = $request->answer32;
                       $question->answer4 = $request->answer42;
                        $question->save();


                    }else if ($i==3) {
                        $question->content = $request->questionContent3;
                        $question->pointAmount = (int) (($request->questionPrice3/100)*20);
                       $question->answer1 = $request->answer13;
                       $question->answer2 = $request->answer23;
                       $question->answer3 = $request->answer33;
                       $question->answer4 = $request->answer43;
                        $question->save();

                    }else if ($i==4) {
                        $question->content = $request->questionContent4;
                        $question->pointAmount = (int) (($request->questionPrice4/100)*20);
                       $question->answer1 = $request->answer14;
                       $question->answer2 = $request->answer24;
                       $question->answer3 = $request->answer34;
                       $question->answer4 = $request->answer44;
                        $question->save();

                    }else if ($i==5) {
                        $question->content = $request->questionContent5;
                        $question->pointAmount = (int) (($request->questionPrice5/100)*20);
                       $question->answer1 = $request->answer15;
                       $question->answer2 = $request->answer25;
                       $question->answer3 = $request->answer35;
                       $question->answer4 = $request->answer45;
                        $question->save();

                    }else if ($i==6) {
                        $question->content = $request->questionContent6;
                        $question->pointAmount = (int) (($request->questionPrice6/100)*20);
                       $question->answer1 = $request->answer16;
                       $question->answer2 = $request->answer26;
                       $question->answer3 = $request->answer36;
                       $question->answer4 = $request->answer46;
                        $question->save();

                    }else if ($i==7) {
                        $question->content = $request->questionContent7;
                        $question->pointAmount = (int) (($request->questionPrice7/100)*20);
                       $question->answer1 = $request->answer17;
                       $question->answer2 = $request->answer27;
                       $question->answer3 = $request->answer37;
                       $question->answer4 = $request->answer47;
                        $question->save();

                    }else if ($i==8) {
                        $question->content = $request->questionContent8;
                        $question->pointAmount = (int) (($request->questionPrice8/100)*20);
                       $question->answer1 = $request->answer18;
                       $question->answer2 = $request->answer28;
                       $question->answer3 = $request->answer38;
                       $question->answer4 = $request->answer48;
                        $question->save();

                    }else if ($i==9) {
                        $question->content = $request->questionContent9;
                        $question->pointAmount = (int) (($request->questionPrice9/100)*20);
                       $question->answer1 = $request->answer19;
                       $question->answer2 = $request->answer29;
                       $question->answer3 = $request->answer39;
                       $question->answer4 = $request->answer49;
                        $question->save();

                    }


                }




                //update the user wallet amount
                User::where('id', auth()->user()->id)
                    ->update(['amount' => (int) auth()->user()->amount - (int) $totalAmount]);

                Session::flash('success','Campaign created successfully. We will confirm it and get back to you shortly, keep tracking the updates ');
                return redirect()->route('my_campaigns');


            }





        //$question->save();


    }

    /**
     * Display the specified resource                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $campaign = Campaign::find($id);




        //Analytics queries
        $questions=Question::where('campaign_id', $campaign->id)
            ->join('categories','categories.id','=', 'questions.category_id')
            ->select('questions.*','categories.name')
            ->orderBy('id', 'asc')
            ->get();

        $nbOfQuestion = Question::where('campaign_id', $campaign->id)->count();




        $chartForAnswers = collect([]);


        for ($i=0;$i<$nbOfQuestion;$i++)
        {
            $chartForAnswer = new questionChart;
            $chartForAnswer->labels([$questions[$i]->answer1, $questions[$i]->answer2, $questions[$i]->answer3, $questions[$i]->answer4]);
            $chartForAnswer->dataset('Votes for answers', 'line', [$questions[$i]->nbAnswer1,$questions[$i]->nbAnswer2,$questions[$i]->nbAnswer3,$questions[$i]->nbAnswer4]);

            $chartForAnswers->push($chartForAnswer);

        }


        //print_r(($chartForAnswers->toArray())[20]);



        return view('campaignDetails')
            ->with('campaign', $campaign)
            -> with('nbOfQuestion',$nbOfQuestion)
            -> with('questions',$questions)

            ->with('chartForAnswer', $chartForAnswer)
            ->with('chartForAnswers', $chartForAnswers->toArray());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
