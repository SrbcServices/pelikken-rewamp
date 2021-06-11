<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\privacy;

class privacyController extends Controller
{
    public function privacy(){

      $privacy = privacy::first();

        return view('admin.privacypolicy',['privacy'=>$privacy]);
    }

    public function privacy_store(Request $request){


        $validated = \Validator::make($request->all(),[
            'privacy_policy' => 'required',

            ]);

            
            if($validated->fails()){
                return response()->json([
                    'status'=>'error',
                    'message'=>'Something is required'
                ]);
            }

            $available = privacy::get();

             if(count($available)>0){
                $privacy = privacy::first();
                $privacy->PrivacyPolicy = $request->privacy_policy;
                $saved = $privacy->save();

                if($saved){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Successfully Updated',
                    ]);
                }

             }
             else{
                $privacy = new privacy();
                $privacy->PrivacyPolicy = $request->privacy_policy;
                $saved = $privacy->save();
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
