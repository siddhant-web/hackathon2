<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class Login extends Controller
{
    public function show()
    {
        
    }
    public function login(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'email' => 'required|email|exists:users,email',
                'password'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message[0],"status" => 201);
            return response()->json($data,200);
        }
        
        $result = DB::table('users')->where('email','=', $request->email)->first();
        if($result->password == $request->password)
        {
            if($result->user_type == 'general')
            {
                Session::put('user',$result);
                if($result->new_user == true)
                {
                    //send to plan list and tag list
                    $data = array('status'=>true,'new_user'=>true);
                }
                else
                {
                    $data = DB::table('user_tags')->select('tag_id')->where('id','=',$result->id)->get();
                    //send to question list
                    Session::put('tags',$data);
                    $data = array('status'=>true);
                }
            }
        }
        else
        {
            $data = array('status'=>false,'message'=>'Wrong Password');
        }
        return response()->json($data,200);
    }
    public function signup(Request $request)
    {
        $validation = Validator::make(
            $request->all(),[
                'email' => 'required|email|unique:users,email',
                'password'=>'required',
                'confirm_password'=>'required|same:password',
                'name'=>'required'
            ]);
        if ($validation->fails()) 
        {
            $message=$validation->errors()->all();
            $data=array('error' => true,'message'=>$message[0],"status" => 201);
            return response()->json($data,200);
        }
        
        $result = DB::table('users')->insertGetId(
            ['email'=>$request->email, 'password'=>$request->password, 'name'=>$request->name, 'user_type'=>'general' , 'plan'=>'free', 'new_user'=>true, 'fcm_token'=>"qqqq"]
        );
        
        if($result)
        {
            $data = DB::table('users')->where('id','=',$result)->get();
            Session::put('user',$data);
            $data = array('status'=>true);
        }
        else
        {
            $data = array('status'=>false);
        }
        return $data;
    }
}
