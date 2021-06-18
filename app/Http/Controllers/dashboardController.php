<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class dashboardController extends Controller
{
    public function dash(){
        $news_count = news::count();
        $comments_count = comments::count();
        // $total_news_registration = news::count();

       
        
             return view('admin.dashboard',['news_count'=>$news_count,'comments_count'=>$comments_count]);
    }
}
