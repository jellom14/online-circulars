<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCircularRequest;
use App\Http\Requests\UpdateCircularRequest;
use App\Models\Circular;
use Symfony\Component\HttpFoundation\Response;

class CircularController extends Controller
{
    public function store(AddCircularRequest $request){ //CREATE ROLE
 
        $circular=new Circular($request->validated());
        $circular->save();

        return response()->json($circular,Response::HTTP_OK);
    }

    public function update($id,UpdateCircularRequest $request){ //UPDATE ROLE
   
        $circular=Circular::find($id);
        $circular->update($request->validated());
        
        return response()->json($circular,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $circular=Circular::find($id);

        return response()->json($circular,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $circular=Circular::find($id);
        $circular->delete();

        return response()->json($circular,Response::HTTP_OK);
    }
}