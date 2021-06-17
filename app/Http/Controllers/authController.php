<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
   public function register(){

    return view('auth.register');
    
   }

   public function login(){

      return view('auth.login');
   }

   //create an account frome frontent
   public function create_account(Request $request){
      $validated = Validator::make($request->all(),[
         'full_name'=>'required|string',
         'email'=>'required|email',
         'password'=>'required',
         'confirm_password'=>'required',
         'terms'=>'required'
      ]);

      if($validated->fails()){
         return response()->json([
            'status'=>'error',
            'message'=>$validated->getMessageBag()->toArray()
         ]);
      }

      //check if two passwords are equal
      if($request->password != $request->confirm_password){
         return response()->json([
            'status' =>'password',
            'message'=>'Passwords Donot match'
         ]);
      }
      //if all are currect the user needs to register
      

   }
}
