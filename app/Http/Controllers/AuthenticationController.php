<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function __invoke(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
    
        $credentials = ['email' => $email, 'password' => $password];
    
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            echo $user;
            $token = $user->createToken('API Token')->accessToken;
        
            return response()->json(['access_token' => $token], 200);
        } 
        
        else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        
    }
}
