<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCircularAttachmentRequest;
use App\Http\Requests\UpdateCircularAttachmentRequest;
use App\Models\CircularAttachment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CircularAttachmentController extends Controller
{
    public function store(AddCircularAttachmentRequest $request){ //CREATE ROLE
 
        $circularattachment=new CircularAttachment($request->validated());
        $circularattachment->save();

        return response()->json($circularattachment,Response::HTTP_OK);
    }

    public function update($id,UpdateCircularAttachmentRequest $request){ //UPDATE ROLE
   
        $circularattachment=CircularAttachment::find($id);
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

        return response()->json($circularattachment,Response::HTTP_OK);
    }
}