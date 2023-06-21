<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCircularRequest;
use App\Http\Requests\UpdateCircularRequest;
use App\Models\Circular;
use App\Models\CircularAttachment;
use App\Models\StaffViewLog;
use App\Models\StudentViewLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CircularController extends Controller
{
    public function store(AddCircularRequest $request){ //CREATE ROLE
        $circular = new Circular($request->validated());
        
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

    public function show($id, Request $request){ //SHOW ROLE
        $circular=Circular::find($id);

        $filePath = "circulars/{$circular->id}/{$circular->id}.pdf";

        if (Storage::exists($filePath)) {
   
            $fileContent = base64_encode(Storage::get($filePath));

            $response = response($fileContent, Response::HTTP_OK);
            
        
        $token = request()->bearerToken();
        


        $user_id = DB::table('oauth_access_tokens')->where('id', $token)->value('user_id');

        // then retrieve the user from it's primary key
        $user = User::findOrFail($user_id);
        echo $user;

        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $email = $user->email;
            echo "hello";
        }
        
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
            $email = $user->email;
            echo "hello";
        }
        
            



        // if(Auth::guard('student')->attempt($credentials)){
        // config(['auth.guards.api.provider'=> 'users']);
        // $user = Auth::guard('student')->user();
        // dd($user);
        // }
        
        
        
//         if ($token){
//         //find user in staff
//         $user = Auth::guard('web')->user();
        
//         //if user not found
//         if (!$user){
            
//         //find user in student
//         $user = Auth::guard('student')->user();
//         $loggedid = $user->id;

//         // create logs for staffviewlog for staff
//         $staffviewlog = new StaffViewLog();
//         $staffviewlog->circular()->associate($id);
//         $staffviewlog->staff_log()->associate($loggedid);
//         $staffviewlog->save();

//         echo "STAFF";
//     } 

//         else {
//             $user = Auth::guard('student')->user();
//             $loggedid = $user->id;

//             // create logs for studentviewlog for student
//             $studentviewlog = new StudentViewLog();
//             $studentviewlog->circular()->associate($id);
//             $studentviewlog->student_log()->associate($loggedid);
//             $studentviewlog->save();

//             echo "STUDENT";
//         }
// }

            return $response;

    }
        return response()->json($circular,Response::HTTP_OK);
}

    public function destroy($id){ //DELETE ROLE
        $circular=Circular::find($id);

        $file="{$circular->id}.pdf";
        $dest = "circulars/{$circular->id}";
        $dest2 = "circularattachments";

        if(Storage::exists("$dest/$dest2")){ //delete circ attach directory
            Storage::deleteDirectory("$dest/$dest2");

        }

        $circular->delete();

        if(Storage::exists("$dest/$file")){ //delete circular file
            Storage::delete("$dest/$file");
            }
        
        return response()->json($circular,Response::HTTP_OK);
    }

    public function index(Request $request){ // search
        
     
        // $circular = Circular::query()->with("category")->paginate($pageSize);

        $pageSize = 20;

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