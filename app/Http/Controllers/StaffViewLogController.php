<?php

namespace App\Http\Controllers;

use App\Models\StaffViewLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffViewLogController extends Controller
{
    public function store(Request $request){ //CREATE ROLE
        $validated=$request->validate([
            'circular_id'=>'required|max:20',
            'staff_log_id'=>'required|max:20'
        ]);

        $staffviewlog=new StaffViewLog();
        $staffviewlog->staff_log()->associate($validated['staff_log_id']);
        $staffviewlog->circular()->associate($validated['circular_id']);
        $staffviewlog->save();

        return response()->json($staffviewlog,Response::HTTP_OK);
    }

    public function update($id,Request $request){ //UPDATE ROLE
        $validated=$request->validate([
            'circular_id'=>'required|max:20',
            'staff_log_id'=>'required|max:20'
        ]);
        

        $staffviewlog=new StaffViewLog();
        $staffviewlog=StaffViewLog::find($id);
        $staffviewlog->staff_log()->associate($validated['staff_log_id']);
        $staffviewlog->circular()->associate($validated['circular_id']);
        $staffviewlog->update($validated);
        
        return response()->json($staffviewlog,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $staffviewlog=StaffViewLog::find($id);

        return response()->json($staffviewlog,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $staffviewlog=StaffViewLog::find($id);
        $staffviewlog->delete();

        return response()->json($staffviewlog,Response::HTTP_OK);
    }
}
