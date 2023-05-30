<?php

namespace App\Http\Controllers;

use App\Models\StudentViewLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentViewLogController extends Controller
{
    public function store(Request $request){ //CREATE ROLE
        $validated=$request->validate([
            'circular_id'=>'required|max:20',
            'student_log_id'=>'required|max:20'
        ]);

        $studentviewlog=new StudentViewLog();
        $studentviewlog->student_log()->associate($validated['student_log_id']);
        $studentviewlog->circular()->associate($validated['circular_id']);
        $studentviewlog->save();

        return response()->json($studentviewlog,Response::HTTP_OK);
    }

    public function update($id,Request $request){ //UPDATE ROLE
        $validated=$request->validate([
            'circular_id'=>'required|max:20',
            'student_log_id'=>'required|max:20'
        ]);
        
        $studentviewlog=new StudentViewLog();
        $studentviewlog=StudentViewLog::find($id);
        $studentviewlog->student_log()->associate($validated['student_log_id']);
        $studentviewlog->circular()->associate($validated['circular_id']);
        $studentviewlog->update($validated);
        
        return response()->json($studentviewlog,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $studentviewlog=StudentViewLog::find($id);

        return response()->json($studentviewlog,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $studentviewlog=StudentViewLog::find($id);
        $studentviewlog->delete();

        return response()->json($studentviewlog,Response::HTTP_OK);
    }
}
