<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    public function create()
    {
        return view('create-category');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        //$category->category_id = $request->id;
        
        
        $category->save();
        return redirect('create-category');
    }
}
