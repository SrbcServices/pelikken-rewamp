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
    public function index()
    {

        $sources = source::all();
        $category = category::all();
        $quantinet = condinent::all();
        $tags = tags::all();



    
        return view('admin.form', ['sources' => $sources, 'category' => $category, 'quantinents' => $quantinet, 'tags' => $tags]);
    }


    public function fetch_sub_category($id)
    {
        $sub_categories = subCategory::where('category_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'sub_categories' => $sub_categories
        ]);
    }

    //country

    public function fetch_country($id)
    {
        $countries = country::where('condinent_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'countries' => $countries
        ]);
    }

    public function store(Request $request)
    {


        $validated = \Validator::make($request->all(), [
            'news_heading' => 'required',
            'news_sub_heading' => 'required',
            'source' => 'required',
            'Category' => 'required',
            'NewsDiscription' => 'required',
            'thumb_image' => 'required',
        ]);
        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validated->getMessageBag()->toarray()
            ]);
        }


        /////////////////////
        $x = true;
        $error = "";
        try {
            DB::transaction(function () use ($request) {

                $thumb_image = $request->thumb_image;
                list($type, $thumb_image) = explode(';', $thumb_image);
                list(, $thumb_image) = explode(',', $thumb_image);
                $thumb_image = base64_decode($thumb_image);
                $thumb_image_name = time() . '.png';
                file_put_contents(public_path('uploads/news/') . $thumb_image_name, $thumb_image);




                $news = new news();
                $news->NewsHeading = $request->news_heading;
                $news->SubHeading = $request->news_sub_heading;
                $news->Source = $request->source;
                $news->Condinent = $request->Condinent;
                $news->Country = $request->Country;
                $news->Category = $request->Category;
                $news->SubCategory = $request->SubCategory;
                if($request->Featured != 'undefined'){
                    $news->Featured = $request->Featured;
                }
                if($request->highlight !='undefined'){
                    $news->Highlight = $request->highlight;
                }
                if($request->trending !='undefined'){
                    $news->Trending = $request->trending;
                }
               
                
               
                $news->ThumbImage = $thumb_image_name;
                $news->NewsDiscription = $request->NewsDiscription;

                $news->save();

                if ($request->hasFile('banner_image')) {
                    $file = $request->file('banner_image');
                    $filename = $file->getClientOriginalName();
                    $banner_name = time() . str_replace(' ', '_', $filename);
                    //move file to the folder
                    $file->move(public_path('uploads/news_banners'), $banner_name);
                    $news_imag = new newsImages();
                    $news_imag->News_id = $news->id;
                    $news_imag->ImageName = $banner_name;
                    $news_imag->save();
                }
                if ($request->hasFile('news_video')) {
                    $video = $request->file('news_video');
                    $video_name = $video->getClientOriginalName();
                    $news_videos = time() . str_replace(' ', '_', $video_name);
                    //move video to the folder
                    $video->move(public_path('uploads/news_video'), $video_name);
                    $news_video = new newsVideo();
                    $news_video->News_id = $news->id;
                    $news_video->VideoName = $video_name;
                    $news_video->save();
                }

                //save tags
                if ($request->tags) {

                    $tags_array = explode(',', $request->tags);
                    foreach ($tags_array as $tag) {
                        $news_tag = new newstags();
                        $news_tag->News_id = $news->id;
                        $news_tag->tag_id = $tag;
                        $news_tag->save();
                    }
                }
            });
        } 
        catch (\Exception $e) {
            $error = $e;
            $x = false;
        }
        if ($x) {
            return response()->json([
                'status' => 'success',
                'message' => 'News successfully added'
            ]);
        } else {
            return response()->Json(['status' => 'fail', 'error' => $error]);
        }



        

    }

    //get all news
    public function get_all_news()
    {
        $news = news::select('id', 'NewsHeading', 'Featured', 'Trending', 'Highlight', 'ThumbImage')->get();
        return view('admin.all-news', ['news' => $news]);
    }
    //edit news page enter here
    public function edit($id)
    {
        $news_details = news::with('source', 'condinent', 'country', 'category', 'tags', 'newsImages', 'newsVideo')->find($id);
    
        return view('admin.edit_news', ['news_details' => $news_details]);
    }

    public function update(Request $request, $id)
    {

        $validated = \Validator::make($request->all(), [
            'News_Heading' => 'required',
            'Sub_Heading' => 'required',
            'source' => 'required',
            'category' => 'required',
            'News_Heading' => 'required',

        ]);
        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validated->getMessageBag()->toarray()
            ]);
        }
        //if validator is success
        $news = news::find($id);
        $news->NewsHeading = $request->News_Heading;
        $news->SubHeading = $request->Sub_Heading;
        $news->Source = $request->source;
        $news->Condinent = $request->condinent;
        $news->Country = $request->condinent;
        $news->Category = $request->category;
        $news->SubCategory = $request->sub_category;
        $news->NewsDiscription = $request->discription;

        $news->save();
        if ($request->tags) {

            newstags::where('News_id', $id)->delete();
            foreach ($request->tags as $tag) {
                $news_tag = new newstags();
                $news_tag->News_id = $id;
                $news_tag->tag_id = $tag;
                $news_tag->save();
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully updated basic details '
        ]);
    }
    //update options enter here
    public function update_options($id, $name, $status = null)
    {
        $news = news::find($id);
        if ($status != 'undefined') {
            $news->$name = $status;
        } else {
            $news->$name = null;
        }

        $saved = $news->save();
        if ($saved) {
            return response()->json([
                'status' => 'succes',
                'message' => 'successfully updated the status'
            ]);
        }
    }
    //update the thumbnail images
    public function update_thumb(Request $request)
    {
    
        $validated = \Validator::make($request->all(), [
            'thumb_img' => 'required',
        ]);

        if($validated->fails()){
            return response()->json([
                'status' => 'error',
                'message' => 'something'
            ]);
        
        }
        
     
            //saving new thumb image
            $thumb_image = $request->thumb_img;
            list($type, $thumb_image) = explode(';', $thumb_image);
            list(, $thumb_image) = explode(',', $thumb_image);
            $thumb_image = base64_decode($thumb_image);
            $thumb_image_name = time() . '.png';
            file_put_contents(public_path('uploads/news/') . $thumb_image_name, $thumb_image);
            //get current news object
            $news = news::find($request->id);
            //get already have image name
            if ($news->ThumbImage != "") {
                $image_path = public_path("uploads/news/{$news->ThumbImage}");
                unlink($image_path);
            }
            //save to database with news image
            $news->ThumbImage = $thumb_image_name;
            $saved = $news->save();

            if ($saved) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Succesfully updated Thumbnail image'
                ]);
            }
        
           
       
    }

    //update multimedia
    public function update_multimedia(Request $request){
        $i = 0;
        if($request->banner_image == 'undefined'){
            $i = $i + 1;
        }
        if($request->news_video == 'undefined'){
            $i = $i+1;
        }

        if($i>1){
            return response()->json([
                'status'=>'error',
                'message'=>'Please select atleast one '
            ]);
        }
        $inserted_items = [];
        if ($request->hasFile('banner_image')) {

            //select the current banner image frome the server
            $news_imag = newsImages::where('News_id',$request->id)->first();
            
            if($news_imag){

                $image_path = public_path("uploads/news_banners/{$news_imag->ImageName}");
                unlink($image_path);
                //save new image to the folder
                $file = $request->file('banner_image');
                $filename = $file->getClientOriginalName();
                $banner_name = time() . str_replace(' ', '_', $filename);
                //move file to the folder
                $file->move(public_path('uploads/news_banners'), $banner_name);
              
                $news_imag->News_id = $request->id;
                $news_imag->ImageName = $banner_name;
               $saved = $news_imag->save();

            }else{
                $file = $request->file('banner_image');
                $filename = $file->getClientOriginalName();
                $banner_name = time() . str_replace(' ', '_', $filename);
                //move file to the folder
                $file->move(public_path('uploads/news_banners'), $banner_name);
                $news_imag = new newsImages();
                $news_imag->News_id = $request->id;
                $news_imag->ImageName = $banner_name;
                $saved = $news_imag->save();
            }
            
           if($saved){
            $inserted_items['image_name'] = $banner_name;
           }
        }
        //check if the request has a file of video
        if($request->hasFile('news_video')){
            //check if the news have already one video
            $news_video = newsVideo::where('News_id',$request->id)->first();
            //check already updated the name exist

            if($news_video){
                $video_path = public_path("uploads/news_video/{$news_video->VideoName}");
                unlink($video_path);

                 //save new image to the folder
                 $file = $request->file('news_video');
                 $filename = $file->getClientOriginalName();
                 $video_name = time() . str_replace(' ', '_', $filename);
                 //move file to the folder
                 $file->move(public_path('uploads/news_video'),$video_name);
               
                 $news_video->News_id = $request->id;
                 $news_video->VideoName = $video_name;
                 $video_saved = $news_video->save();
            }else{
                $file = $request->file('news_video');
                $filename = $file->getClientOriginalName();
                $video_name = time() . str_replace(' ', '_', $filename);
                //move file to the folder
                $file->move(public_path('uploads/news_video'),$video_name);
                $news_video = new newsVideo();
                $news_video->News_id = $request->id;
                $news_video->VideoName = $video_name;
                $video_saved = $news_video->save();

            }
            if($video_saved){
                $inserted_items['video_name'] = $video_name;
            }


        }
        //check if the request full filled successfully
        if(count($inserted_items)>0){
            return response()->json([
                'status'=>'success',
                'message'=>'succesfully updated media files',
                'names'=>$inserted_items

            ]);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong please try again'

            ]);
        }

       
    }

    //delete news frome the database
    public function delete_news(Request $request){
        $deleted = news::find($request->id)->delete();
       
        if($deleted){
            return response()->json([
                'status'=>'success',
                'message'=>'successfully deleted the news'
            ]);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'something went wrong ,please try again'
            ]);
        }
    }

    //update status from all list

    public function update_single_all(Request $request){
        $field = $request->name;
        $news = news::find($request->news_id);
        $news->$field = $request->status;
        $saved = $news->save();
        if($saved){
            return response()->json([
                'status'=>'success',
                'message'=>'Successfully updated'
            ]);
        }
    }
}
