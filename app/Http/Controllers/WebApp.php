<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use DB;
use Session;

class WebApp extends Controller
{
    public function generateHome(Request $request)
    {
        $user_id = Session::get('user')->id;
        $tags = Session::get('tags')->id;
        $result = DB::table('questions')->leftJoin('question_tags', 'question_tags.questionn','=','questions.id')->whereIn('question_tags.tag_id',$tags)->groupBy('questions.id')->get();
        return response()->json($result,200);
    }
    public function home()
    {
        return view('welcome');
    }
    public function associateTagsToUser()
    {
        //add tag to user
    }
    public function answerAQuestion(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'answer'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message);
            return response()->json($data,400);
        }
    }
    public function planSelection()
    {
        return view('planSelect');
    }
    public function tagSelection()
    {
        return view('tagSelect');
    }
    public function assignPlanToUser(Request $request)
    {
        $result = DB::table('users')->where('id','=',Session::get('user')->id)->update(['plan'=>$request->type]);
        if($result)
        {
            $data = array('status'=>true);
        }
        else
        {
            $data = array('status'=>false, 'message'=>"Please try again");
        }
        return response()->json($data,200);
    }
}
