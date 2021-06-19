<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\commends;
use App\Models\condinent;

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
        'condinent_name'=> $condinent_name,
        'news_counts' =>$news_counts,
    ]);
    }

    public function registered(){
        // $registered_users = 
    }

   

    
           

}
