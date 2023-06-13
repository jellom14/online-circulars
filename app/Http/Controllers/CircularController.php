<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCircularRequest;
use App\Http\Requests\UpdateCircularRequest;
use App\Models\Circular;
use App\Models\CircularAttachment;
use Storage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CircularController extends Controller
{
    public function store(AddCircularRequest $request){ //CREATE ROLE
        $circular=new Circular($request->validated());
        $circular->userscreate()->associate(1);
        $circular->usersupdate()->associate(1);
        $circular->usersdelete()->associate(1);
        
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

        $filePath = "circulars/{$circular->id}/{$circular->id}.pdf";

        if (Storage::exists($filePath)) {

            $fileContent = Storage::get($filePath);
    
            // Create a response with the file contents as the body
            $response = response($fileContent, Response::HTTP_OK);
            $response->header('Content-Type', 'application/pdf');
    
            return $response;
        }

        
        return response()->json($circular,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $circular=Circular::find($id);
        $circular->delete();

        $file = "{$circular->id}.pdf";
        $dest = "circulars/{$circular->id}";
        $dest2 = "circularattachments";


        if(Storage::exists("$dest/$file")){
        Storage::delete("$dest/$file");
       
        $attachments = Storage::allFiles("$dest/$dest2");

        foreach ($attachments as $attachment) {
            $filename = pathinfo($attachment)['filename'];
            $attachmentModel = CircularAttachment::where('name', $filename)
                ->where('circular_id', $circular->id)
                ->first();

            if ($attachmentModel) {
                $attachmentModel->delete();
            }
        }
        

        }

        if(Storage::exists("$dest/$dest2")){
            Storage::deleteDirectory("$dest/$dest2");

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