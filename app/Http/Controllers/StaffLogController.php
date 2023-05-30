<?php

namespace App\Http\Controllers;

use App\Models\StaffLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffLogController extends Controller
{
    public function store(Request $request){ //CREATE ROLE
        $validated=$request->validate([
            'user_id'=>'required|max:20',
        ]);

        $stafflog=new StaffLog($validated);
        $stafflog->save();

        return response()->json($stafflog,Response::HTTP_OK);
    }

    public function update($id,Request $request){ //UPDATE ROLE
        $validated=$request->validate([
            'user_id'=>'required|max:20',
        ]);
        
        $stafflog=StaffLog::find($id);
        $stafflog->update($validated);
        
        return response()->json($stafflog,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $stafflog=StaffLog::find($id);

        return response()->json($stafflog,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $stafflog=StaffLog::find($id);
        $stafflog->delete();

        return response()->json($stafflog,Response::HTTP_OK);
    }
}
