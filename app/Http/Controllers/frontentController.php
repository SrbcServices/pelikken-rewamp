<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\condinent;
use App\Models\news;

class frontentController extends Controller
{
    
    public function index(){
       $highlights = news::where('Highlight','!=',null)->orderBy('id','desc')->limit(5)->get();
       $trending = news::where('trending','!=' ,null)->orderBy('id','desc')->limit(20)->get();
       $latest_news = news::orderBy('id','desc')->limit(12)->get();
    return view('frontent.home_page',['highlights'=>$highlights,'trending'=>$trending,'latest_news'=>$latest_news]);

        
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
