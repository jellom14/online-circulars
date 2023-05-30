<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffController extends Controller{

    public function store(AddStaffRequest $request){ //CREATE ROLE
 
        $user=new User($request->validated());
        $user->save();

        return response()->json($user,Response::HTTP_OK);
    }

    public function update($id,UpdateStaffRequest $request){ //UPDATE ROLE
   
        $user=User::find($id);
        $user->update($request->validated());
        
        return response()->json($user,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $user=User::find($id);

        return response()->json($user,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $user=User::find($id);
        $user->delete();

        return response()->json($user,Response::HTTP_OK);
    }
}





