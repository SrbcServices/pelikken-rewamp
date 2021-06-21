<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;




class authController extends Controller
{
   public function register(){
      if(!Auth::check()){
         return view('auth.register');
      }else{
         return redirect('/');
      }
 
    
   }

   public function login(){
      if(!Auth::check()){
         return view('auth.login');
      }else{
         return redirect('/');
      }
   }

   public function verify_email(){
     return view('auth.verify-email');
   }

   public function verify(EmailVerificationRequest $request){
     
         $request->fulfill();
         return redirect('/admin');
   }
   //create an account frome frontent
   public function create_account(Request $request){
      $validated = Validator::make($request->all(),[
         'full_name'=>'required|string',
         'email'=>'required|email',
         'password'=>'required',
         'confirm_password'=>'required',
   
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
      //check if the email already exists
      $already_exist = User::where('email',$request->email)->first();
      if($already_exist){
         return response()->json([
            'status'=>'already',
            'message'=>'The Email Address is already exist'
         ]);
      }

      //if all are currect the user needs to register
      $user = new User();
      $user->name = $request->full_name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $created = $user->save();
      if($created){
    
         event(new Registered($user));
         $user = [
            'email' => $request->email,
            'password' => $request->password
        ];
         Auth::attempt($user);
         return response()->json([
            'status'=>'success',
            'message'=>'accout is created'
         ]);
      }


   }

   //do login
   public function do_login(Request $request){

    
      $validator = \Validator::make($request->all(), [
         'email' => 'required',
         'password' => 'required'
     ]);

     if ($validator->fails()) {
         return response()->Json(array(
             'status' => 'error',
             'message' => 'All Field is Required'
         ));
     }
     
     $credentials = $request->only('email', 'password');
     if (Auth::attempt($credentials)){
     return response()->json([
        'status'=>'success',
        'message'=>'authentication successfull'
     ]); 

      }else{
        return response()->json([
           'status'=>'error',
           'message'=>'Email or Password Donot match'
        ]);

      }
    

     
   }

   //logout
public function logout(){
   Auth::logout();
    
   return redirect('/login');
}

//forgot password

public function forgot_password(Request $request)
{
   return view('auth.forgot-password');
}
//reset link is here
public function forgot(Request $request){
   $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => 'Password Reset Link send to your email'])
                : back()->withErrors(['email' => __($status)]);
   }

   //password  reset page
   public function reset_password($token){
      return view('auth.reset-password', ['token' => $token]);
   }
   //post reset password
   public function post_reset_password(Request $request){
      $request->validate([
         'token' => 'required',
         'email' => 'required|email',
         'password' => 'required|min:8|confirmed',
     ]);
 
     $status = Password::reset(
         $request->only('email', 'password', 'password_confirmation', 'token'),
         function ($user, $password) {
             $user->forceFill([
                 'password' => Hash::make($password)
             ])->setRememberToken(Str::random(60));
 
             $user->save();
 
             event(new PasswordReset($user));
         }
     );
 
     return $status === Password::PASSWORD_RESET
                 ? redirect()->route('login')->with('status', 'Password Reseted Succesfully Please Login Here')
                 : back()->withErrors(['email' => [__($status)]]);
   }


}
