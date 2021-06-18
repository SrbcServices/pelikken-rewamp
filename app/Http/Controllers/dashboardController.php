<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\commends;
use App\Models\condinent;



class dashboardController extends Controller
{
    public function dash(){
        $news_count = news::count();
        $comments_count = commends::count();
        $trending_news = news::where('trending','on')->count();
       
                
        // $total_news_registration = news::count();        
         return view('admin.dashboard',['news_count'=>$news_count,'comments_count'=>$comments_count,'trending_news'=>$trending_news]);
    }
    public function graph(){
        $news = news::get();
        $news[0]->condinent;
        $condinent = condinent::all();
        foreach ($news as $new => $news) {
            // foreach($news->ne as $news){
                
            // }
            return $news;
            
        }
    }
}
