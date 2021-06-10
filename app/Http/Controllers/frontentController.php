<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\condinent;
use App\Models\news;

class frontentController extends Controller
{
    public function __construct(Request $request)
    {
        $latest_global_news = news::select('id','NewsHeading','created_at','ThumbImage','Category')->orderBy('id','desc')->limit(10)->get();
        $global_news_highlights = news::select('id','NewsHeading','created_at','ThumbImage','Category')->where('Highlight','!=',null)->orderBy('id','desc')->limit(10)->get();
        $global_feature_featured = news::select('id','NewsHeading','created_at','ThumbImage','Category')->where('featured','!=',null)->orderBy('id','desc')->limit(10)->get();
        $global_trending_featured = news::select('id','NewsHeading','created_at','ThumbImage','Category')->where('trending','!=',null)->orderBy('id','desc')->limit(10)->get();
        
        \View::share('latest_global_news', $latest_global_news);
        
        \View::share('global_news_highlights', $global_news_highlights);
        
        \View::share('global_feature_featured', $global_feature_featured);
        
        \View::share('global_trending_featured', $global_trending_featured);
    }

    public function index()
    {
        $highlights = news::where('Highlight', '!=', null)->orderBy('id', 'desc')->limit(5)->get();
        $trending = news::where('trending', '!=', null)->orderBy('id', 'desc')->limit(20)->get();
        $latest_news = news::orderBy('id', 'desc')->limit(12)->get();
        return view('frontent.home_page', ['highlights' => $highlights, 'trending' => $trending, 'latest_news' => $latest_news]);
    }

    //latest news
    public function latest_news()
    {

        $latest_news = news::paginate(50);

        return view('frontent.latest_news', ['latest_news' => $latest_news]);
    }

    //NEWSES

    public function newses(){

        return view('frontent.newspost');
    }


    //all news in world
    public function world()
    {

        $world = news::whereNotNull('condinent')->get();


        return view('frontent.world', ['world' => $world]);
    }
    //category wise news filtering

    public function category_wise($category, $sub_category = null)
    {
        $query = news::query();
        $query->when($category, function ($q) use ($category) {


            return $q->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        });
        $query->when($sub_category, function ($q) use ($sub_category) {
            return $q->whereHas('sub_category', function ($q) use ($sub_category) {
                $q->where('slug', $sub_category);
            });
        });
        $news = $query->get();
      

       
        return view('frontent.block', ['news' => $news,'main'=>$category,'sub'=>$sub_category]);
    }


   public function country_wise($condinent,$country = null){

    $query = news::query();

    $query->when($condinent, function ($q) use ($condinent){

        return $q->whereHas('condinent', function ($q) use ($condinent){

            $q->where('slug', $condinent);
        });

    });

    $query->when($country, function ($q) use ($country){

        return $q->whereHas('country', function ($q) use ($country){

            $q->where('slug', $country);
        });

    });



    $news = $query->get();

    

    return view('frontent.finance',['news'=>$news, 'main'=>$condinent, 'sub'=>$country]);



   }



}
