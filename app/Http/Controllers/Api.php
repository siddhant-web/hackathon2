<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class Api extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'email'=>'required|email',
                'password'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message);
            return response()->json($data,400);
        }
        
        $result = DB::table('users')->where('email','=',$request->email)->first();
        if($request->password == $result->password)
        {
            $data = array('data'=>$result,'status'=>true);
            return response()->json($data,200);
        }
        else
        {
            $data = array('msg'=>'Wrong password','status'=>false);
            return response()->json($data,200);
        }
    }
    public function gettagList()
    {
        $result = DB::table('tags')->get();
        return response()->json($result,200);
    }
    public function assignTagsToExpert(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'user_id'=>'required',
                'tags'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message);
            return response()->json($data,400);
        }
        //$id_list = explode(',',$request->tags);
        
        foreach($request->tags as $row)
        {
            $data = DB::table('user_tags')->where('user_id','=',$request->user_id)->where('tag_id','=',$row['id'])->count();
            if($data == 0)
            {
                $result = DB::table('user_tags')->insert(['user_id'=>$request->user_id , 'tag_id'=>$row['id']]);
            }
            else
            {
                $result = true;
            }
            //return response()->json($result,200);
        }
        if($result)
        {
            $data = array('status'=>true);
            return response()->json($data,200);
        }
    }
    public function getRecentQuestion(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'user_id'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message);
            return response()->json($data,400);
        }
        $user_tags = DB::table('user_tags')->select('tags.id')->leftJoin('tags','tags.id','=','user_tags.tag_id')->where('user_id','=',$request->user_id)->get();
        
        //$tag_ids = implode(',',$user_tags);
        $result = array();
        foreach($user_tags as $key => $value)
        {
            $data = DB::table('questions')
            ->leftJoin('question_tags','question_tags.question_id','=','questions.id')
                ->where('question_tags.tag_id', '=', $value->id)
                ->get();//->toArray();
            array_push($result,$data);
        }
        $data = array('data'=>$result[0],'status'=>true);
        return response()->json($data,200);
        
    }
    public function updateFCMToken(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'user_id'=>'required',
                'fcm_token'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message);
            return response()->json($data,400);
        }
        
        $result = DB::table('users')
            ->where('id', $request->user_id)
            ->update(['fcm_token' => $request->fcm_token]);
        if($result)
        {
            $data = array('status'=>true);
            return response()->json($data,200);
        }
    }
    public function addingAnAnswer(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'user_id'=>'required',
                'question_id'=>'required',
                'answer'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message);
            return response()->json($data,400);
        }
        
        $result = DB::table('answers')->insert(
            [ 'user_id'=>$request->user_id, 'answer'=>$request->answer, 'question_id'=>$request->question_id ]
        );
        if($result)
        {
            $result = DB::table('questions')
                ->where('id', $request->question_id)
                ->update(['is_answered_exp' => true]);
            //fire notification
            $this->fireAnsweredNotification($request->user_id,$request->question_id);
            $data = array('status'=>true);
            return response()->json($data,200);
        }
    }
    public function fireAnsweredNotification($id,$qid)
    {
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Hello world')
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        // You must change it to get your tokens
        $tokens = MYDATABASE::pluck('fcm_token')->toArray();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification);
    }
}
