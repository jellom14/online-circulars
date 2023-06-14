<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCircularAttachmentRequest;
use App\Http\Requests\UpdateCircularAttachmentRequest;
use App\Models\CircularAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CircularAttachmentController extends Controller
{
    public function store(AddCircularAttachmentRequest $request){ //CREATE 
 
        $circularattachment=new CircularAttachment($request->validated());

        // $circularattachment->userscreate()->associate(1);
        // $circularattachment->usersupdate()->associate(1);
        // $circularattachment->usersdelete()->associate(1);

        $circularattachment->save();
        
        
        if($circularattachment){
            $request->file->storeAs("circulars/{$circularattachment->circular_id}/circularattachments","{$circularattachment->name}.pdf");   
        }

        return response()->json($circularattachment,Response::HTTP_OK);
    }

    public function update($id,UpdateCircularAttachmentRequest $request){ //UPDATE 
   
        $circularattachment=CircularAttachment::findOrFail($id);
        
        $file = "{$circularattachment->name}.pdf";
        $dest = "circulars/{$circularattachment->circular_id}/circularattachments";
        
        $circularattachment->update($request->validated());

        
        if ($request->hasFile('file')){
            if(Storage::exists("$dest/$file")){
                Storage::delete("$dest/$file");
            } 
            Storage::putFileAs($dest,$request->file('file'),$file);
        }

        $circularattachment->update($request->validated());
        
        return response()->json($circularattachment,Response::HTTP_OK);

    }

    public function show($id){ //SHOW 
        $circularattachment=CircularAttachment::find($id);

        $filePath = "circulars/{$circularattachment->circular_id}/circularattachments/{$circularattachment->name}.pdf";
        
        if (Storage::exists($filePath)) {
         
            $fileContent = base64_encode(Storage::get($filePath));
    
            $response = response($fileContent, Response::HTTP_OK);
            //$response->header('Content-Type', 'application/pdf');
    
            return $response;
        }

        return response()->json($circularattachment,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE
        $circularattachment=CircularAttachment::find($id);
        $circularattachment->delete();

        $file="{$circularattachment->name}.pdf";
        $dest = "circulars/{$circularattachment->circular_id}/circularattachments";

        if(Storage::exists("$dest/$file")){
        Storage::delete("$dest/$file");
        }

        return response()->json($circularattachment,Response::HTTP_OK);
    }
}