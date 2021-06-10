<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\settings;

class settingsController extends Controller
{
    public function settings(){

        $settings = \DB::table('settings')->select('id','Instagram','Facebook','Youtube','Twitter')->first();
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
        if ($request->hasFile('newlogo')) {
            $file = $request->file('newlogo');
            $filename = $file->getClientOriginalName();
            $banner_name = time() . str_replace(' ', '_', $filename);
            //move file to the folder
            $file->move(public_path('uploads/logo'), $banner_name);
        }


             $available = settings::get();

             if(count($available)>0){
                $settings = settings::first();
                $settings->Instagram =$request->instagram;
                $settings->Facebook = $request->facebook;
                $settings->Youtube =$request->youtube;
                $settings->Twitter=$request->twitter;
                $settings->LogoImageName=$banner_name;
                $saved = $settings->save();

                if($saved){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Successfully Updated',
                    ]);
                }
     
             }

             else{

                $settings = new settings();
                $settings->Instagram =$request->instagram;
                $settings->Facebook = $request->facebook;
                $settings->Youtube =$request->youtube;
                $settings->Twitter=$request->twitter;
                $settings->LogoImageName=$banner_name;
                $saved = $settings->save();

             }


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
