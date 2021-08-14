<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\settings;

class settingsController extends Controller
{
    public function settings(){

       
        $settings = settings::first();
        // return $settings;

        return view('admin.general_settings',['settings'=>$settings]);
    }

    public function store(Request $request){

        
        $validated = \Validator::make($request->all(),[
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
           
     ]);
             if($validated->fails()){
                 return response()->json([
                     'status'=>'error',
                     'message'=>'Something is required'
                 ]);
             }
                 // LOGO
       


             $available = settings::get();

             if(count($available)>0){
                 //save to folder
                 if ($request->hasFile('newlogo')) {
                   
                    $file = $request->file('newlogo');
                    $filename = $file->getClientOriginalName();
                    $banner_name = time().str_replace(' ', '_', $filename);
                    //move file to the folder
                    $file->move(public_path('uploads/logo'), $banner_name);

                    //check already have a logo
                    $current_name = $available[0]->LogoImageName;
                    if($current_name){
                        $path = public_path('/uploads/logo/'.$current_name.'');
                        unlink($path);
                    }
                }
        

                $settings = settings::first();
                $settings->Instagram =$request->instagram;
                $settings->Facebook = $request->facebook;
                $settings->Youtube =$request->youtube;
                $settings->Twitter=$request->twitter;
                if($request->hasFile('newlogo')){
                    $settings->LogoImageName=$banner_name;
                }
                
                $saved = $settings->save();

               

                if($saved){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Successfully Updated',
                    ]);
                }
     
             }
                 //save to folder
                 if ($request->hasFile('newlogo')) {
                    
                    $file = $request->file('newlogo');
                    $filename = $file->getClientOriginalName();
                    $banner_name = time() . str_replace(' ', '_', $filename);
                    //move file to the folder
                    $file->move(public_path('uploads/logo'), $banner_name);
                }

                $settings = new settings();
                $settings->Instagram =$request->instagram;
                $settings->Facebook = $request->facebook;
                $settings->Youtube =$request->youtube;
                $settings->Twitter=$request->twitter;
                if($request->hasFile('newlogo')){
                    $settings->LogoImageName=$banner_name;
                }
                $saved = $settings->save();

 


         if(!$saved){

            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }

        return response()->json([
         
            'message' => 'Successfully Updated',
            'status'=>'Success',
        ]);
        

    }
}
