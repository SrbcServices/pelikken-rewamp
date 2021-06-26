<?php

namespace App\Http\Controllers;
use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\condinent;
use App\Models\news;
use App\Models\NewsArrangment;
use App\Models\contact;
use App\Models\terms;

use App\Models\privacy;
use Session;

class frontentController extends Controller
{

     //terms Frontent start
    
     public function terms_condition(){

        $terms = terms::first();

        return view('frontent.termsfrontent',['terms'=>$terms]);
    }

 //terms Frontent End
    public function __construct(Request $request)
    {
        $latest_global_news = news::select('id', 'NewsHeading', 'created_at', 'ThumbImage', 'Category', 'slug')->orderBy('id', 'desc')->limit(10)->get();
        $global_news_highlights = news::select('id', 'NewsHeading', 'created_at', 'ThumbImage', 'Category', 'slug')->where('Highlight', '!=', null)->orderBy('id', 'desc')->limit(10)->get();
        $global_feature_featured = news::select('id', 'NewsHeading', 'created_at', 'ThumbImage', 'Category', 'slug')->where('featured', '!=', null)->orderBy('id', 'desc')->limit(10)->get();
        $global_trending_featured = news::select('id', 'NewsHeading', 'SubHeading', 'created_at', 'ThumbImage', 'Category', 'slug')->where('trending', '!=', null)->orderBy('id', 'desc')->limit(10)->get();

        \View::share('latest_global_news', $latest_global_news);

        \View::share('global_news_highlights', $global_news_highlights);

        \View::share('global_feature_featured', $global_feature_featured);

        \View::share('global_trending_featured', $global_trending_featured);
    }
    public function contacts(){

        $contacts = contact::first();
       

        return view('frontent.contact',['contacts'=>$contacts]);
    }

    public function index()
    {
        $highlights = news::where('Highlight', '!=', null)->orderBy('id', 'desc')->limit(5)->get();
        $trending = news::where('trending', '!=', null)->orderBy('id', 'desc')->limit(20)->get();
        $latest_news = news::orderBy('id', 'desc')->limit(12)->get();

        //section news
        $section_news_main =  NewsArrangment::where('type', 1)->with('get_category.get_news')->orderBy('order', 'asc')->limit(10)->get();
        $section_news_sidebar =  NewsArrangment::where('type', 2)->with('get_category.get_news')->orderBy('order', 'asc')->limit(10)->get();
        // return  $section_news_sidebar;

        return view('frontent.home_page', ['highlights' => $highlights, 
        'trending' => $trending, 
        'latest_news' => $latest_news,
         'section_news_main' => $section_news_main, 
         'section_news_sidebar' => $section_news_sidebar,
        'api'=>$this->api_fetch()
        ]);
    }

    //latest news
    public function latest_news()
    {

        $latest_news = news::orderBy('id','desc')->paginate(10);

        return view('frontent.latest_news', ['latest_news' => $latest_news]);
    }

    //single news

    public function newses($slug)
    {
        $news = news::with('newsImages','newsVideo','tags')->where('slug',$slug)->first();
    // return $news;
        return view('frontent.single_news',['news'=>$news]);
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



        return view('frontent.block', ['news' => $news, 'main' => str_replace('_',' ',$category), 'sub' => str_replace('_',' ',$sub_category)]);
    }


    public function country_wise($condinent, $country = null)
    {

        $query = news::query();

        $query->when($condinent, function ($q) use ($condinent) {

            return $q->whereHas('condinent', function ($q) use ($condinent) {

                $q->where('slug', $condinent);
            });
        });

        $query->when($country, function ($q) use ($country) {

            return $q->whereHas('country', function ($q) use ($country) {

                $q->where('slug', $country);
            });
        });



        $news = $query->get();



        return view('frontent.dual', ['news' => $news, 'main' => $condinent, 'sub' => $country]);
    }
    //tagwise news
    
    public function tag(Request $request){
        $query = news::query();
        $query->wherehas('tags',function($q) use ($request){
            $q->where('slug',$request->tag_name);
        });

        $news = $query->get();

        return view('frontent.block',['news' => $news, 'main' => 'tags', 'sub' => $request->tag_name]);
        
    }

    //seaech functionalilty
    public function search(Request $request){
        $result = news::where('NewsHeading', 'LIKE', '%' . $request->query_param .'%')->get();

        return view('frontent.block',['news' => $result, 'main' => 'search', 'sub' => '']);
        
    }

    //about frontent
    public function about(){
        
        $about = about::first();
        return view('frontent.about',['about'=>$about]);
    }
    //privacy and policy
    public function privacy(){

        $privacy = privacy::first();

          return view('frontent.privacy',['privacy'=>$privacy]);
      }

    //api calling

    public function api_fetch(){
        $response = Http::withHeaders([
            'X-Client' => 'pelikkencomapi',   
        ])->withToken(Session()->get('cision_token'))
        ->get('https://contentapi.cision.com/api/v1.0/releases?mod_startdate=20200801T102000-0000&language=en&fields=multimedia|title|date|release_id|company|industry|subject|summary')->json();
     
        if(array_key_exists("data",$response)){
           return $response['data'];

        }else{
             //token is invalid so generate a new token
             $login = Http::withHeaders([
                'X-Client' => 'pelikkencomapi',
               
            ])->post('https://contentapi.cision.com/api/v1.0/auth/login', [
                "login"=>config('api_cision.api_user'),
                "pwd"=>config('api_cision.api_secret')
            ]);
           
            $token = $login['auth_token'];
            //put new token to session
            Session()->put('cision_token', $token);
            $response = Http::withHeaders([
                'X-Client' => 'pelikkencomapi',   
            ])->withToken($token)
            ->get('https://contentapi.cision.com/api/v1.0/releases?mod_startdate=20200801T102000-0000&language=en&fields=multimedia|title|date|release_id|company|industry|subject|summary')->json();
           return $response['data'];
        }

    }
   //api
    public function api($id){
        $response = Http::withHeaders([
            'X-Client' => 'pelikkencomapi',   
        ])->withToken(Session()->get('cision_token'))
        ->get('https://contentapi.cision.com/api/v1.0/releases/'.$id.'')->collect();
        $data = collect($response);
        return view('frontent.Api_news',['api'=>$data]);
    }
    //api call here
    public function all_api(){
        $news =  $this->api_fetch();
        return view('frontent.all_api_news',['api'=>$news]);
    }

  
}
