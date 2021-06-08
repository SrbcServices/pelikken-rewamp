<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\condinent;
use App\Models\news;

class frontentController extends Controller
{
    
    public function index(){
       
        return view('layouts.header-frontent');

        
    }
    
    //latest news
    public function latest_news(){
     
        $latest_news = news::paginate(50);
        
        return view('frontent.latest_news',['latest_news'=>$latest_news]);
       
    }

    public function world(){

        $world = news::whereNotNull('condinent')->get();

        
        return view('frontent.world',['world'=>$world]);
    }
}
