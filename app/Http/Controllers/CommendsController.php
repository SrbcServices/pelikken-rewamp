<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commends;

class CommendsController extends Controller
{
    public function store(Request $request){
      
       $validator = \Validator::make($request->all(),[
           'email'=>'required',
           'full_name'=>'required',
           'messege'=>'required'
       ]);
       if($validator->fails()){
           return response()->json([
               'status'=>'error',
               'message'=>'All Fields Required'
           ]);
       }

       //save the commends to the database
       $comment = new commends();
       $comment->name = $request->full_name;
       $comment->email = $request->email;
       $comment->message = $request->messege;
       $comment->status = 0;
       $comment->news_id = $request->id;
       $comment->save();

       return response()->json([
           'status'=>'success',
           'message'=>'Succesfully commented your comment will be shown after the verification'
       ]);
    }

    public function comment_admin(){

        $comments = commends::get();     

        return view('admin.comments',['comments'=>$comments]);
    }

    public function update($id,$status){

        $comment = commends::find($id);
        $comment->status = $status;
        $comment->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Sucessfully updated'

        ]);
           
        
    }
}
