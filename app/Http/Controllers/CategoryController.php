<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
  
    public function store(Request $request){ //CREATE ROLE
        $validated=$request->validate([
            'name'=>'required|max:20',
        ]);

        $category=new Category($validated);
        $category->save();

        return response()->json($category,Response::HTTP_OK);
    }

    public function update($id,Request $request){ //UPDATE ROLE
        $validated=$request->validate([
            'name'=>'required|max:20',
        ]);
        
        $category=Category::find($id);
        $category->update($validated);
        
        return response()->json($category,Response::HTTP_OK);

    }

    public function show($id){ //SHOW ROLE
        $category=Category::find($id);

        return response()->json($category,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $category=Category::find($id);
        $category->delete();

        return response()->json($category,Response::HTTP_OK);
    }
}
