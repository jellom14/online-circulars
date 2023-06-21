<?php

namespace App\Http\Controllers;

use App\Models\StudentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller{
        public function __invoke(Request $request){
    
            //authenticate email and password
            $email = $request->input('email');
            $password = $request->input('password');
    
            //verify if staff (ifstaff = true/false)
            // $isStaff= $request->input('isStaff');
    
            //input text into array
            $credentials = ['email' => $email, 'password' => $password];
    
            //if guard is staff = null/users by default
            // $guard = $isStaff ? null : 'student';
    
            //verify if credentials is in staff table
             if(Auth::guard('student')->attempt($credentials)){
    
                config(['auth.guards.api.provider'=> 'students']);
                $user = Auth::guard('student')->user();
                $token = $user->createToken('API Token')->accessToken;
                $userType = 'student';

                $id = $user->id;
        
                //create logs for studentlogs
                $studentlog=new StudentLog();
                $studentlog->student()->associate($id);
                $studentlog->save();

                return response()->json(['access_token' => $token, 'user_type' => $userType,'user'=>$user], 200);
    
             }
    
             return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
    