<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //

    function add(Request $role){
    $role = new Role;
    $hello = 'Admin';
    $role -> $hello = $role -> Name;   
    
    $role -> save();
    return redirect('add'); 


    }
}
