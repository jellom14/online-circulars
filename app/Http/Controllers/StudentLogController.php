<?php

namespace App\Http\Controllers;

use App\Models\StudentLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentLogController extends Controller
{
    public function store(Request $request){ //CREATE ROLE
        $validated=$request->validate([
            'student_id'=>'required|max:20',
        ]);

        $studentlog=new StudentLog($validated);
        $studentlog->save();

        return response()->json($studentlog,Response::HTTP_OK);
    }

    public function update($id,Request $request){ //UPDATE ROLE
        $validated=$request->validate([
            'student_id'=>'required|max:20',
        ]);
        
        $studentlog=StudentLog::find($id);
        $studentlog->update($validated);
        
        return response()->json($studentlog,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $studentlog=StudentLog::find($id);

        return response()->json($studentlog,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $studentlog=StudentLog::find($id);
        $studentlog->delete();

        return response()->json($studentlog,Response::HTTP_OK);
    }
}