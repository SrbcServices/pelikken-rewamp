<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\source;
use App\Models\category;
use App\Models\condinent;
use App\Models\country;
use App\Models\tags;
use App\Models\subCategory;
use App\Models\news;
use App\Models\newsImages;
use App\Models\newsVideo;
use App\Models\newstags;

use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $sources = source::all();
        $category = category::all();
        $quantinet = condinent::all();
        $tags = tags::all();
        // return news::with('source')->get();
        // return country::with('condinent')->get();

        //return news::with('condinent','source','category','sub_category','tags')->get();
            
            

        return view('admin.form',['sources'=>$sources,'category'=>$category,'quantinents'=>$quantinet,'tags'=>$tags]);

    }


public function fetch_sub_category($id){
  $sub_categories = subCategory::where('category_id',$id)->get();
   return response()->json([
    'status'=>'success',
    'sub_categories'=>$sub_categories
]);

}

//country

public function fetch_country($id){
    $countries = country::where('condinent_id',$id)->get();
     return response()->json([
      'status'=>'success',
      'countries'=>$countries
  ]);
  
  }

  public function store(Request $request){
    
    $validated = \Validator::make($request->all(),[
        'news_heading' => 'required',
        'news_sub_heading' => 'required',
        'source' => 'required',
        'Category' => 'required',
        'NewsDiscription' => 'required',
        'thumb_image' => 'required',
            ]);
         if($validated->fails()){
             return response()->json([
                 'status'=>'error',
                 'errors' => $validated->getMessageBag()->toarray()
             ]);
         }

        
/////////////////////
        $x = true;
        $error = "";
        try {
            DB::transaction(function () use ($request) {
               
                $thumb_image = $request->thumb_image;
                list($type, $thumb_image) = explode(';',$thumb_image);
                list(, $thumb_image) = explode(',',$thumb_image);
                $thumb_image = base64_decode($thumb_image);
                $thumb_image_name = time().'.png';
                file_put_contents(public_path('uploads/news/').$thumb_image_name, $thumb_image);
       
       
       
       
           $news = new news();
           $news->NewsHeading= $request->news_heading;
                $news->SubHeading= $request->news_sub_heading;
                $news->Source= $request->source;
                $news->Condinent=$request->Condinent;
                $news->Country=$request->Country;
                $news->Category=$request->Category;
                $news->SubCategory=$request->SubCategory;
                $news->Featured=$request->Featured;
                $news->Highlight=$request->highlight;
                $news->Trending=$request->trending;
                $news->ThumbImage=$thumb_image_name;
                $news->NewsDiscription=$request->NewsDiscription;
       
                $news->save();
       
                if($request->hasFile('banner_image')){
                   $file = $request->file('banner_image');
                   $filename = $file->getClientOriginalName();
                   $banner_name = time() . str_replace(' ', '_', $filename);
                    //move file to the folder
                   $file->move(public_path('uploads/news_banners'), $banner_name);
                   $news_imag = new newsImages();
                   $news_imag->News_id =$news->id;
                   $news_imag->ImageName =$banner_name;
                   $news_imag->save();
       
                }
                if($request->hasFile('news_video')){
                    $video = $request->file('news_video');
                    $video_name = $video->getClientOriginalName();
                    $news_videos = time().str_replace(' ','_',$video_name);
                    //move video to the folder
                    $video->move(public_path('uploads/news_video'),$video_name);
                    $news_video = new newsVideo();
                    $news_video->News_id =$news->id;
                    $news_video->VideoName =$video_name;
                    $news_video->save();
                    
                    
                }
                // return tags;
       
                //save tags
                
                
                    
                  
                  $tags = explode(',',$request->tags);

                    foreach($tags as $tag){
                      
                      $news_tag = new newstags();
                      $news_tag->News_id = $news->id;
                      $news_tag->tag_id = $tag;
                      $news_tag->save();
                    }
            });
        } 
        catch (\Exception $e) {
            $error = $e;
            $x = false;
        }
        if ($x) {
            return response()->json([
                'status'=>'success',
                'message'=>'News successfully added'
            ]);
        } else {
            return response()->Json(['status' => 'fail','error'=>$error]);
        }

      
  }


  public function get_all_news(){
      $news = news::select('id','NewsHeading','Featured','Trending','Highlight','ThumbImage')->get();
      return view('admin.all-news',['news'=>$news]);
  }

}
