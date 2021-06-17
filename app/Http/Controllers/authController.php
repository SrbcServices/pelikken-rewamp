<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
   public function register(){

    return view('admin.register');
   }

   public function login(){

      return view('admin.login');
   }
}
