<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
<<<<<<< HEAD
=======
use App\Models\commends;
>>>>>>> main

class dashboardController extends Controller
{
    public function dash(){
        $news_count = news::count();
        $comments_count = comments::count();
        // $total_news_registration = news::count();
<<<<<<< HEAD

       
=======
>>>>>>> main
        
             return view('admin.dashboard',['news_count'=>$news_count,'comments_count'=>$comments_count]);
    }
}
