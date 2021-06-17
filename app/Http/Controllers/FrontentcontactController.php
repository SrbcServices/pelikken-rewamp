<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\frontentcontact;

class FrontentcontactController extends Controller
{
    public function store(Request $request){

        $validated = \Validator::make($request->all(),[
            'full_name' => 'required',
            'subject' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'messege' => 'required',
         
           
     ]);
             if($validated->fails()){
                 return response()->json([
                     'status'=>'error',
                     'message'=>'Something is required'
                 ]);
             }

        $contact = new frontentcontact();
        $contact->FullName = $request->full_name;
        $contact->Subject = $request->subject;
        $contact->Email = $request->email;
        $contact->PhoneNumber = $request->phone;
        $contact->Message = $request->messege;
        $contact->Status = 0;
        
        $saved = $contact->save();

        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }

        return response()->json([
         
            'message' => 'Your Message has been sended',
            'status'=>'Success',
        ]);

    }

public function update($id){

$contact = frontentcontact::find($id);
$contact->Status = 1;

$saved = $contact->save();


return response()->json([
    'status'=>'success',
    'message'=>'item is updated'
]);

}

}
