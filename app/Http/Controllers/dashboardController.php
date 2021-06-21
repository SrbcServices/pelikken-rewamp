<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\commends;
use App\Models\condinent;
use App\Models\User;

class dashboardController extends Controller
{
    public function dash(){
        $conti_arr = [];
        $all_arr = [];
        $news_count = news::count();
        $comments_count = commends::count();
        $trending_news = news::with('trending')->count();


       $dash_value =  condinent::with('get_news')->get();
      
        $condinent_name = [];
        $news_counts = [];

       foreach ($dash_value as $val){
           
        array_push($condinent_name,$val->Condinent_Name);
        array_push($news_counts,count($val->get_news));
       }



          
    
        return view('admin.dashboard',['news_count'=>$news_count,
        'comments_count'=>$comments_count,
        'trending_news'=>$trending_news,
        'condinent_name'=>json_encode($condinent_name),
        'news_counts' =>json_encode($news_counts),
        'register'=>$this->register(),
    ]);
    }

    public function register(){

        $register = User::count();

        return $register;
    }

   

    
           

}
