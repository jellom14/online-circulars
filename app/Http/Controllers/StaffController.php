<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
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

    public function index(Request $request){ // search
        
        $pageSize = $request->page_size ?? 20;
        // $circular = Circular::query()->with("category")->paginate($pageSize);


        $staff = User::query()
        ->where("first_name", "LIKE", "%JelloB%")
        ->where("role_id", 2)
        ->with("role")
        ->paginate($pageSize);
        
         return  response()->json($staff, Response::HTTP_OK);

        //dd($request->all());
    
        //GET localhost/online=circulars/public/api/circular?page=1&search=test&category=1

    }
    
}





