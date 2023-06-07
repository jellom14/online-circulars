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
    public function store(AddCircularAttachmentRequest $request){ //CREATE ROLE
 
        $circularattachment=new CircularAttachment($request->validated());
        $circularattachment->save();
        
        
        if($circularattachment){
            $request->file->storeAs("circulars/{$circularattachment->circular_id}/circularattachments/{$circularattachment->id}","{$circularattachment->id}.pdf");   
        }

        return response()->json($circularattachment,Response::HTTP_OK);
    }

    public function update($id,UpdateCircularAttachmentRequest $request){ //UPDATE ROLE
   
        $circularattachment=CircularAttachment::findOrFail($id);
        
        $file="{$circularattachment->id}.pdf";
        $dest = "circulars/circularattachments/{$circularattachment->id}";
        
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

    public function show($id){ //SHOW ROLE
        $circularattachment=CircularAttachment::find($id);

        return response()->json($circularattachment,Response::HTTP_OK);
    }

    public function destroy($id){ //DELETE ROLE
        $circularattachment=CircularAttachment::find($id);
        $circularattachment->delete();

        $file="{$circularattachment->id}.pdf";
        $dest = "circulars/{$circularattachment->circular_id}/circularattachments/{$circularattachment->id}";

        if(Storage::exists("$dest/$file")){
        Storage::delete("$dest/$file");
        }

        return response()->json($circularattachment,Response::HTTP_OK);
    }
}