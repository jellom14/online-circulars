<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller{
    public function store(AddStudentRequest $request){ //CREATE ROLE
 
        $student=new Student($request->validated());
        $student->save();

        return response()->json($student,Response::HTTP_OK);
    }

    public function update($id,AddStudentRequest $request){ //UPDATE ROLE
   
        $student=Student::find($id);
        $student->update($request->validated());
        
        return response()->json($student,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $student=Student::find($id);

        return response()->json($student,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $student=Student::find($id);
        $student->delete();

        return response()->json($student,Response::HTTP_OK);
    }
}