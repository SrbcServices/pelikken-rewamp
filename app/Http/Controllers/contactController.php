<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\frontentcontact;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class contactController extends Controller
{
    public function contact(){

        $contact = contact::first();

        return view('admin.contact',['contact'=>$contact]);
    }
   
    public function users(){

       $user= User::get();
      
        return view('admin.users',['user'=>$user]);
    }

    public function message(){
        
        $message = frontentcontact::get();

        return view('admin.message',['message'=>$message]);
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

    //create new admin user from backend
    public function create_admin_user(Request $request){
        $validated = \Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'confirm_password'=>'required'
        ]);

        if($validated->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'All fields required',
                'error'=>$validated->getMessageBag()->toArray()
            ]);
        }
        //check if the passwords are match
        if($request->password != $request->confirm_password){
            return response()->json([
                'status'=>'fail',
                'message'=>'confirm password Does not match'
            ]);
        }
        //check if the email is already exist in the database
        $already = User::where('email',$request->email)->first();
  
        if($already){
            return response()->json([
                'status'=>'already',
                'message'=>'The Email address is already exist'
            ]);
        }

        //if all done save a new user
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->email_verified_at = Carbon::now();
        $admin->password = Hash::make($request->password);
        $admin->is_Admin = 1;
        $saved = $admin->save();
        if($saved){
            return response()->json([
                'status'=>'success',
                
            ]);
        }
        
    }
}
