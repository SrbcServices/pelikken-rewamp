<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tags;

class TagsController extends Controller
{
    Public function index()
    {
        $tags = tags::all();
        return view ('admin.tags',['tags'=>$tags]);
    }


    public function store(Request $request)
    {
      $validated = \Validator::make($request->all(),[
       'tag_name' => 'required',
]);
        if($validated->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'tag Name is required'
            ]);
        }
        
        $tags = new tags();
        $tags->tag_name = $request->tag_name;
        $tags->slug=str_replace (' ','_',$request->tag_name);
        $saved = $tags->save();

        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }

        return response()->json([
            'message' => 'tags Added',
            'status'=>'Success',
        ]);
    }

    //update

    public function update(Request $request)
        {

            $tags = tags::find($request->id);
            $tags->tag_name = $request->tag_name;
            $tags->slug=str_replace (' ','_',$request->tag_name);
           

            $tags->save(); 

            return response()->json([
                'status'=>'success',
                'message'=>'item is updated'
            ]);
            
        }

        //Delete
        public function delete($id){

            $deleted = tags::find($id)->delete();
    
    if($deleted){
        return response()->json([
            'status'=>'success',
            'message'=>'deleted'
        ]);
    }
    return response()->json([
        'status'=>'error',
        'message'=>'error'
    ]);
           
    
        }

}
