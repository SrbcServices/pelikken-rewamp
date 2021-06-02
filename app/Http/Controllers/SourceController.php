<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\source;

class SourceController extends Controller
{
    Public function index()
    {
        $sources = source::all();
        return view ('admin.source',['sources'=>$sources]);
    }


    //store

    public function store(Request $request)
    {
      $validated = \Validator::make($request->all(),[
       'source_name' => 'required',
]);
        if($validated->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'source name is required'
            ]);
        }
        
        $source = new source();
        $source->source_name = $request->source_name;
        $source->slug=str_replace (' ','_',$request->source_name);
        $saved = $source->save();

        

        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }

        return response()->json([
         
            'message' => 'source Added',
            'status'=>'Success',
        ]);
    }

    //update

    public function update(Request $request)
        {

            $source = source::find($request->id);
            $source->source_name = $request->source_name;
            $source->slug=str_replace (' ','_',$request->source_name);
           

            $source->save();

            return response()->json([
                'status'=>'success',
                'message'=>'item is updated'
            ]);
            
        }

        //delete

        public function delete($id){

            $deleted = source::find($id)->delete();
    
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
