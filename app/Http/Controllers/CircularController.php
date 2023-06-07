<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCircularRequest;
use App\Http\Requests\UpdateCircularRequest;
use App\Models\Circular;
use Storage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CircularController extends Controller
{
    public function store(AddCircularRequest $request){ //CREATE ROLE
        $circular=new Circular($request->validated());
        // $circular->createdBy()->associate(1);

        
        $circular->save();
        if($circular){
            $request->file->storeAs("circulars/{$circular->id}","{$circular->id}.pdf");   
        }

        return response()->json($circular,Response::HTTP_OK);
    }

    public function update($id,UpdateCircularRequest $request){ //UPDATE ROLE
   
        $circular=Circular::findOrFail($id);
        
        $file="{$circular->id}.pdf";
        $dest = "circulars/{$circular->id}";
        
        $circular->update($request->validated());

        
        if ($request->hasFile('file')){
            if(Storage::exists("$dest/$file")){
                Storage::delete("$dest/$file");
            } 
            Storage::putFileAs($dest,$request->file('file'),$file);
        }

        
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

        $file="{$circular->id}.pdf";
        $dest = "circulars/{$circular->id}";
        $dest2 = "circulars/{$circular->id}/circularattachments";

        if(Storage::exists("$dest/$file")){
        Storage::delete("$dest/$file");
        Storage::delete("$dest/$dest2");
        }

        return response()->json($circular,Response::HTTP_OK);
    }

    public function index(Request $request){ // search
        
        $pageSize = $request->page_size ?? 20;
        // $circular = Circular::query()->with("category")->paginate($pageSize);


        $circular = Circular::query()
        ->where("name", "LIKE", "%MyCirc%")
        ->where("category_id", 2)
        ->with("category")
        ->paginate($pageSize);
        
         return  response()->json($circular, Response::HTTP_OK);

        //dd($request->all());
    
        //GET localhost/online=circulars/public/api/circular?page=1&search=test&category=1

    }

}