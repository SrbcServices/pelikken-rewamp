<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about;

class aboutController extends Controller
{
    public function about(){

      $about = about::first();
      
    return view('admin.about',['about'=>$about]);
    }

    public function store(Request $request){

        $validated = \Validator::make($request->all(),[
            'about_discription' => 'required',

            ]);

            
            if($validated->fails()){
                return response()->json([
                    'status'=>'error',
                    'message'=>'Something is required'
                ]);
            }

            $available = about::get();

             if(count($available)>0){
                $about = about::first();
                $about->AboutDiscription = $request->about_discription;
                $saved = $about->save();

                if($saved){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Successfully Updated',
                    ]);
                }

             }
             else{
                $about = new about();
                $about->AboutDiscription = $request->about_discription;
                $saved = $about->save();
             }

             if(!$saved){

                return response()->json([
                    'status'=>'error',
                    'message'=>'Something went wrong',
                ]);
            }
    
            return response()->json([
             
                'status'=>'Success',
                'message' => 'Successfully Updated',
                
            ]);

    }

}