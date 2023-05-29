<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function create()
    {
        return view('create-role');
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
       
        $role->save();
        return redirect('create-role');
    }


    }


