<?php

namespace App\Http\Controllers;

use App\Models\StaffLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffAuthController extends Controller{
    public function __invoke(Request $request){

        //authenticate email and password
        $email = $request->input('email');
        $password = $request->input('password');

        //verify if staff (ifstaff = true/false)
        // $isStaff= $request->input('isStaff');

        //input text into array
        $credentials = ['email' => $email, 'password' => $password];

        //if guard is staff = null/users by default
        // $guard= $isStaff ? null : 'student';

        //verify if credentials is in staff table
         if(Auth::guard('web')->attempt($credentials)){

            config(['auth.guards.api.provider'=> 'users']);
            $user = Auth::guard('web')->user();
            $token = $user->createToken('API Token')->accessToken;
            $userType = 'user';

            $id = $user->id;
        
            //create logs for stafflogs
            $stafflog=new StaffLog();
            $stafflog->staff()->associate($id);
            $stafflog->save();

            return response()->json(['access_token' => $token, 'user_type' => $userType,'user'=>$user], 200);

         }

         return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

