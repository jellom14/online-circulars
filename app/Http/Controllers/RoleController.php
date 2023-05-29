<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    //

    public function createrole(){
        return view('create_role');
    }

    public function insert(Request $role){
    $name = $role -> input('name');   
    $data = array('name'=>$name);
    DB::table('roles')->insert($data);

    echo "Record inserted successfully.<br/>";


    }
}
