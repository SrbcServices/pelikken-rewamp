<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\commends;
use App\Models\condinent;
use App\Models\User;
use App\Models\category;
use App\Models\subCategory;

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
//category wise news listing
$category_wise_news = category::with('get_news')->get();
$category_name =[];
$category_wise_news_count = [];
foreach ($category_wise_news as $category){

    array_push($category_name,$category->category_name);
    array_push($category_wise_news_count,count($category->get_news));

}
//sub category wise graph
$sub_categorised_news = subCategory::with('get_news')->get();

$sub_category_name = [];
$sub_categorised_news_count = [];
foreach ($sub_categorised_news as $sub){

    array_push($sub_category_name,$sub->sub_category_name);
    array_push($sub_categorised_news_count,count($sub->get_news));

}





        return view('admin.dashboard',['news_count'=>$news_count,
        'comments_count'=>$comments_count,
        'trending_news'=>$trending_news,
        'condinent_name'=>$condinent_name,
        'news_counts' =>$news_counts,
        'register'=>$this->register(),
        'category_name'=>$category_name,
        'category_wise_news_count'=>$category_wise_news_count,
        'sub_category_name'=>$sub_category_name,
        'sub_category_count'=>$sub_categorised_news_count
    ]);
    }

    public function register(){

        $register = User::count();
        return $register;
    }

   

    
           

}
