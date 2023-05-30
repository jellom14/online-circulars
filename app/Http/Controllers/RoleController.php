<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller{

    public function store(Request $request){ //CREATE ROLE
        $validated=$request->validate([
            'name'=>'required|max:20',
        ]);

        $role=new Role($validated);
        $role->save();

        return response()->json($role,Response::HTTP_OK);
    }

    public function update($id,Request $request){ //UPDATE ROLE
        $validated=$request->validate([
            'name'=>'required|max:20',
        ]);
        
        $role=Role::find($id);
        $role->update($validated);
        
        return response()->json($role,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $role=Role::find($id);

        return response()->json($role,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $role=Role::find($id);
        $role->delete();

        return response()->json($role,Response::HTTP_OK);
    }
}
