<?php

namespace App\Http\Controllers;
use App\Partners;
use App\Question;
use App\User;
use App\Campaign;
use App\Votes;
use App\WivoUsers;
use Session;
use Illuminate\Http\Request;
use App\Charts\questionChart;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class AdminController extends Controller
{


    //General statistics
    public function index()
    {

        //User Details
        $nbOfUsers= WivoUsers::all()->count();
        $nbOfQuestions= Question::all()->count();
        $nbOfVotes= Votes::all()->count();
        $nbOfUsersMale= WivoUsers::where('sex','male')->count();
        $nbOfUsersFemale= WivoUsers::where('sex','female')->count();
        $avgAge = WivoUsers::avg('age');
        $avgWalletAmount = WivoUsers::avg('walletAmount');

        //Client Details
        $nbClients=User::all()->count();
        $nbOfCampaigns= Campaign::all()->count();
        $delivredCampaigns=Campaign::where('activeCampaign','3')->count();
        $intransitCampaigns=Campaign::where('activeCampaign','2')->count();
        $pendingCampaigns=Campaign::where('activeCampaign','0')->count();
        $approvedCampaigns=Campaign::where('activeCampaign','1')->count();



        return view('/adminDashboard/admin')
            -> with('nbUsers', $nbOfUsers)
            ->with('nbQuestions',$nbOfQuestions)
            ->with('nbVotes',$nbOfVotes)
            ->with('maleUsers',$nbOfUsersMale)
            ->with('femaleUsers',$nbOfUsersFemale)
            ->with('avgAge',$avgAge)
            ->with('avgWalletAmount',$avgWalletAmount)
            ->with('nbClients',$nbClients)
            ->with('nbCampaign',$nbOfCampaigns)
            ->with('delivredCampaigns',$delivredCampaigns)
            ->with('intransitCampaigns',$intransitCampaigns)
            ->with('pendingCampaigns',$pendingCampaigns)
            ->with('approvedCampaigns',$approvedCampaigns)



            ;

    }


    public function addQuestionView ()
    {
        return view('/adminDashboard/addQuestion');

    }

    public function addQuestion(Request $request)
    {
        $question = new Question();
        $question->content=$request->questionContent;
        $question->pointAmount=$request->weCoinAmount;
        $question->startDate=$request->startDate;
        $question->finishDate=$request->finishDate;
        $question->active=1;
        $question->category_id=$request->categorySelect;
        $question->campaign_id=0;
        $question->user_id = auth()->user()->id;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;

        $question->save();

        Session::flash('success','Question added successfully ! ');
        return view('/adminDashboard/addQuestion');

    }

    public function importCSVQuestions(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
    }

    public function questionList()
    {

        $questions=Question::where('campaign_id', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $clientQuestions=Question::where('campaign_id','!=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('/adminDashboard/questionList')
            ->with('questions',$questions)
            ->with('clientQuestions',$clientQuestions);

    }

    public function questionDetails($id)
    {
        $question=Question::where('id', $id)
            ->first();

        //dd($question);
        return view('/adminDashboard/questionDetails')
            ->with('question',$question);


    }

    public function clientStats()
    {
        //Client Details

        $nbClients=User::all()->count();
        $nbOfCampaigns= Campaign::all()->count();
        $delivredCampaigns=Campaign::where('activeCampaign','3')->count();
        $intransitCampaigns=Campaign::where('activeCampaign','2')->count();
        $pendingCampaigns=Campaign::where('activeCampaign','0')->count();
        $approvedCampaigns=Campaign::where('activeCampaign','1')->count();
        $nbOfQuestions= Question::all()->count();

        return view('/adminDashboard/clientStatistics')
            ->with('nbQuestions',$nbOfQuestions)
            ->with('nbClients',$nbClients)
            ->with('nbCampaign',$nbOfCampaigns)
            ->with('delivredCampaigns',$delivredCampaigns)
            ->with('intransitCampaigns',$intransitCampaigns)
            ->with('pendingCampaigns',$pendingCampaigns)
            ->with('approvedCampaigns',$approvedCampaigns);

    }

    public function clientList()
    {

        $clients=User::orderBy('created_at', 'desc')
            ->get();

        return view('/adminDashboard/clientList')
            ->with('clients',$clients);

    }

    public function launchedCampaigns()
    {

        $campaigns=Campaign::orderBy('created_at', 'desc')
            ->get();




        return view('/adminDashboard/launchedCampaigns')->with('campaigns',$campaigns);
            //->with('questionIDs',$questions);
    }

    public function questionSuggestions()
    {
        return view('/adminDashboard/questionSuggestion');
    }

    public function msgRequests()
    {
        return view('/adminDashboard/messageRequests');

    }


    public function confirm($id)
    {


        //update the campaign status
        Campaign::where('id', $id)
            ->update(['activeCampaign' => 1]);

        Question::where('campaign_id', $id)
            ->update(['active' => 1]);

        $questions=Question::where('campaign_id',$id);



        Session::flash('success','Campaign status updated ');
        return redirect()->route('admin.launchedCampaigns');

    }





    public function clientDetail ($id)
    {

        $client=User::where('id', $id)
            ->first();


        return view('/adminDashboard/clientDetails')
        ->with('client',$client);
    }


    public function campaignDetail ($id)
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



        return view('/adminDashboard/campaignDetail')
            ->with('campaign', $campaign)
            -> with('nbOfQuestion',$nbOfQuestion)
            -> with('questions',$questions)
            ->with('chartForAnswer', $chartForAnswer)
            ->with('chartForAnswers', $chartForAnswers->toArray());


    }


    /***********************$************************/
    //Partners management
    public function partnersList()
    {

        $partners=Partners::orderBy('created_at', 'desc')
            ->get();

        return view('/adminDashboard/partnersList')
            ->with('partners',$partners);

    }

    public function partnersAddForm()
    {
        return view('/adminDashboard/partnersAdd');

    }

    public function addPartner(Request $request)
    {

        $partner = new Partners();
        $partner->name=$request->respname;
        $partner->email=$request->respmail;
        $partner->organization=$request->businessname;
        $partner->phonenumber=$request->respphone;
        $partner->businesstype=$request->businesstype;


        $partner->save();

        Session::flash('success','Partner added successfully ! ');
        return redirect()->route('admin.partners.show');
    }



    public function partnersDelete(Request $request)
    {
        $partner = Partners::find($request->id);
        $partner->delete();

        Session::flash('success','Partner deleted successfully ! ');
        return redirect()->route('admin.partners.show');
    }


    public function partnersEdit(Request $request)
    {
        $partner = Partners::find($request->id);
        return view('/adminDashboard/partnersEdit')
            ->with('partner',$partner);

    }

    public function partnersEditsubmitted(Request $request)
    {
        $partner = Partners::find($request->id);
        $partner->name=$request->respname;
        $partner->email=$request->respmail;
        $partner->organization=$request->businessname;
        $partner->phonenumber=$request->respphone;
        $partner->businesstype=$request->businesstype;


        $partner->save();

        Session::flash('success','Partner Editted successfully ! ');
        return redirect()->route('admin.partners.show');
    }


}

class CsvImportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'csv_file' => 'required|file'
        ];
    }
}

class ImportController extends Controller
{

    public function getImport()
    {
        return view('import');
    }

}