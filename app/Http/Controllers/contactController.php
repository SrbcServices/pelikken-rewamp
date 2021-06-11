<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class contactController extends Controller
{
    public function contact(){

        $contact = contact::first();

        return view('admin.contact',['contact'=>$contact]);
    }

    public function users(){

        return view('admin.users');
    }


    //store


    public function store(Request $request){

        $validated = \Validator::make($request->all(),[
            'message' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'map_link' => 'required',
     ]);

     if($validated->fails()){
        return response()->json([
            'status'=>'error',
            'message'=>'Something is required'
        ]);
    }

    $available = contact::get();

             if(count($available)>0){
                $contact = contact::first();
                $contact->Message =$request->message;
                $contact->EmailId = $request->email;
                $contact->PhoneNumber =$request->phone;
                $contact->MapLink=$request->map_link;
                
                $saved = $contact->save();

                if($saved){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Successfully Updated',
                    ]);
                }
     
             }

             else{

                $contact = new contact();
                $contact->Message =$request->message;
                $contact->EmailId = $request->email;
                $contact->PhoneNumber =$request->phone;
                $contact->MapLink=$request->map_link;
                
                $saved = $contact->save();

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
