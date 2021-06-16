<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\terms;

class termsController extends Controller
{
    public function terms(){

        $terms = terms::first();

        return view('admin.termscondition', ['terms'=>$terms]);
    }
    //terms Frontent start
    
        public function terms_condition(){

            $terms = terms::first();

            return view('frontent.termsfrontent',['terms'=>$terms]);
        }

     //terms Frontent End

    public function terms_store(Request $request){


        $validated = \Validator::make($request->all(),[
            'terms_condition' => 'required',

            ]);

            
            if($validated->fails()){
                return response()->json([
                    'status'=>'error',
                    'message'=>'Something is required'
                ]);
            }

            $available = terms::get();

             if(count($available)>0){
                $terms = terms::first();
                $terms->TermsCondition = $request->terms_condition;
                $saved = $terms->save();

                if($saved){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Successfully Updated',
                    ]);
                }

             }
             else{
                $terms = new terms();
                $terms->TermsCondition = $request->terms_condition;
                $saved = $terms->save();
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
