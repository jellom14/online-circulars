<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use Illuminate\Http\Request;

class CircularController extends Controller
{
    public function create()
    {
        return view('create-circular');
    }

    public function store(Request $request)
    {
        $circular = new Circular;
        $circular->category_id= $request->category_id;
        $circular->name = $request->name;
        $circular->number = $request->category_id;
        $circular->date = $request->date;

        
        $circular->save();
        return redirect('create-circular');
    }
}
