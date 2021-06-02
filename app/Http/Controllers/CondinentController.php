<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\condinent;

class CondinentController extends Controller
{
    Public function index()
    {
        $condinents = condinent::all();
        return view ('admin.condinent',['condinents'=>$condinents]);
    }

    public function store(Request $request)
    {
      $validated = \Validator::make($request->all(),[
       'Condinent_Name' => 'required',
      ]);
        if($validated->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'Condinent name is required'
            ]);
        }
        
        $condinent = new condinent();
        $condinent->Condinent_Name = $request->Condinent_Name;
        $condinent->slug=str_replace (' ','_',$request->Condinent_Name);
        $saved = $condinent->save();

    
        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }

        return response()->json([
         
            'message' => 'Condinent Added',
            'status'=>'Success',
        ]);
    }

    //update

    public function update(Request $request)
        {

            $condinent = condinent::find($request->id);
            $condinent->Condinent_Name = $request->Condinent_Name;
            $condinent->slug=str_replace (' ','_',$request->Condinent_Name);
           

            $condinent->save(); 

            return response()->json([
                'status'=>'success',
                'message'=>'item is updated'
            ]);
            
        }

        //delete

        public function delete($id){

            $deleted = condinent::find($id)->delete();
    
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