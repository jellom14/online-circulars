<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('create-student');
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->first_name;
        $student->middle_name = $request->first_name;
        $student->username = $request->first_name;
        $student->password = $request->first_name;
        $student->email = $request->first_name;
        
        $student->save();
        return redirect('create-student');
    }
}
