<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function create()
    {
        return view('create-staff');
    }

    public function store(Request $request)
    {
        $staff = new User;
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->first_name;
        $staff->middle_name = $request->first_name;
        $staff->username = $request->first_name;
        $staff->password = $request->first_name;
        $staff->email = $request->first_name;
        $staff->role_id = $request->role;
        
        $staff->save();
        return redirect('create-staff');
    }


}

