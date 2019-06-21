<?php
namespace App\Http\Controllers\API;
use App\Coupons;
use App\WivoUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Question;
use App\Votes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'mailAddress' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }


        $user = WivoUsers::where('mailAddress', '=', $request->mailAddress)->first();



        if(Auth::guard('WivoUsers')->attempt(['mailAddress' => request('mailAddress'), 'password' => request('password')])){
            $user = Auth::guard('WivoUsers')->user();


            return response()->json(['success' => $user], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }


      /*  if ($user === null) {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
        elseif (Hash::check($user->password, $request->getPassword()))
        {

            $success['name'] =  $user->password;


            return response()->json(['success' => $success, $this-> successStatus]);
        }*


        /*if(Auth::attempt(['mailAddress' => request('mailAddress'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }*/
    }


    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'mailAddress' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'age' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phoneNumber' => 'required',
            'sex' => 'required',
            'pin' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $user = new WivoUsers();

        $user->fullName = $request->fullName;
        $user->mailAddress = $request->mailAddress;
        $user->password = bcrypt($request['password']);
        $user->age = $request->age;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->phoneNumber = $request->phoneNumber;
        $user->sex = $request->sex;
        $user->pin = $request->pin;
        $user ->save();


        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->fullName;
        return response()->json(['success'=>$success], $this-> successStatus);
    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }


    public function index()
    {
        $data = Question::all();
        return response()->json($data, $this-> successStatus);

        //echo $data;
    }




    public function getStatistics()
    {
        $questions = Question::orderBy('id','desc')->take(10)->get();

        $questionsReturned = new Question();

        $questionsReturned=DB::select(
            'SELECT questions.content,
                   questions.answer1,questions.answer2,questions.answer3,questions.answer4
                   ,questions.nbAnswer1,questions.nbAnswer2,questions.nbAnswer3,questions.nbAnswer4,
                   (questions.nbAnswer1+questions.nbAnswer2+questions.nbAnswer3+questions.nbAnswer4) AS totalVotes
           FROM questions

           ORDER BY totalVotes DESC
           LIMIT 10
           ');

        return response()->json(['success' => $questionsReturned], $this-> successStatus);

    }





    /**
     * Add vote to the database, vote should contain userID, questionID and answerVotedFor,
     * answer contains: answer1, answer2, answer3 or answer4.
     */
    public function addVoteToAnswer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userID' => 'required',
            'questionID' => 'required',
            'answerVotedFor' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }



        $userVote = $request->all();
        $user= WivoUsers::find($request->userID);
        $questionNeeded = Question::find($request->questionID);
        //dd($questionNeeded->pointAmount);

        if($questionNeeded->pointAmount>=10)
        {
            $userWin="true";

            //update both question and user wallet amounts
            Question::where('id', $request->questionID)
                ->update(['pointAmount' => (int) $questionNeeded->pointAmount - 10]);
            WivoUsers::where('id',$request->userID)
                ->update(['walletAmount' => (int) $user->walletAmount + 10]);
        }
        else
        {
            $userWin="false";
        }

        Votes::create($userVote);
        if($request->answerVotedFor=="answer1")
        {
            Question::where('id', $request->questionID)
                ->update(['nbAnswer1' => (int) $questionNeeded->nbAnswer1 + 1]);
        }
        elseif($request->answerVotedFor=="answer2")
        {
            Question::where('id', $request->questionID)
                ->update(['nbAnswer2' => (int) $questionNeeded->nbAnswer2 + 1]);
        }
        elseif($request->answerVotedFor=="answer3")
        {
            Question::where('id', $request->questionID)
                ->update(['nbAnswer3' => (int) $questionNeeded->nbAnswer3 + 1]);
        }
        elseif($request->answerVotedFor=="answer4")
        {
            Question::where('id', $request->questionID)
                ->update(['nbAnswer4' => (int) $questionNeeded->nbAnswer4 + 1]);
        }

        Question::where('id', $request->questionID)
            ->update(['nbAnswers' => (int) $questionNeeded->nbAnswers + 1]);


        return response()->json(['success'=>"done", 'userGotPoints'=>$userWin], $this-> successStatus);
    }



    /**
     * Get the questions by category, category selection fel app
     */
    public function getQuestionsByCategoryID(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userID' => 'required',
            'categoryID' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $userID = $request->userID;
        $categoryID = $request->categoryID;

        $Questions=DB::select(
           'SELECT questions.id,questions.content,questions.pointAmount,questions.answer1,questions.answer2,questions.answer3,questions.answer4
            FROM questions
            WHERE questions.id NOT IN (
                SELECT questionID
                FROM votes
                WHERE userID=?)
            AND (questions.active=1)
            AND (questions.category_id=?)
            ORDER BY questions.id DESC ', [$userID, $categoryID]);


        return response()->json($Questions, $this-> successStatus);
    }



    //get all the questions, for the random selection questions
    public function getAllQuestions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userID' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }


        $userID = $request->userID;


        $Questions=DB::select(
            'SELECT questions.id,questions.content,questions.pointAmount,questions.answer1,questions.answer2,questions.answer3,questions.answer4
            FROM questions
            WHERE questions.id NOT IN (
                SELECT questionID
                FROM votes
                WHERE userID=?)
            AND (questions.active=1)
            ORDER BY questions.id DESC ', [$userID]);

        return response()->json($Questions, $this-> successStatus);

    }


    //generate coupon
    public function generateCoupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userName' => 'required',
            'amount' => 'required',
            'userID' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }



        $user = WivoUsers::find($request->userID);
        //dd($user);
        if ($user)
        {
            if (($request->amount) < ($user->walletAmount))
            {
                $coupon = new Coupons();
                $coupon->amount = $request->amount;
                $coupon->userName = $request->userName;
                $coupon->save();
                WivoUsers::where('id', $request->userID)
                    ->update(['walletAmount' => $user->walletAmount - $coupon->amount]);
                return response()->json(['success'=>"done"], $this-> successStatus);
            }
            else
            {
                return response()->json(['success'=>"fail", 'because of' => "user don't have enough money."], $this-> successStatus);

            }
        }
        else
            return response()->json(['success'=>"fail", 'because of' => "user doesn't exist."], $this-> successStatus);
        }





    //withdraw coupon function
    public function withdrawCoupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'couponID' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $coupon = Coupons::find($request->couponID);
        if ($coupon->state=="0")
        {
        Coupons::where('id', $request->couponID)
            ->update(['state' => '1']);
            return response()->json(['success'=>"done"], $this-> successStatus);

        }else{
            return response()->json(['success'=>"failed"], $this-> successStatus);

        }



    }

}