<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\source;
use App\Models\commends;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class news extends Model
{
    use HasFactory;
    use SoftDeletes;



    //if a news is deleted perform these options 
    protected static function booted()
    {
        parent::boot();

        news::deleted(function ($news) {
            //delete thumbnail image
            $path = public_path('uploads/news/'.$news->ThumbImage.'');
            unlink($path);
            //delete all news tags
            $news->newstags()->delete();

            //find and delete the existing news  images and videos
            if ($news->newsImages()->count() > 0) {
                $banner_image_name = $news->newsImages->ImageName;
                $news->newsImages()->delete();
                $banner_image = public_path('uploads/news_banners/' . $banner_image_name . '');
                unlink($banner_image);
            }

            //find and delte news videos
            if ($news->newsVideo()->count() > 0) {
                $news_video_image = $news->newsVideo->VideoName;

                if ($news_video_image) {
                    $news_vid = public_path('uploads/news_video/' . $news_video_image . '');
                    unlink($news_vid);
                }
                
                $news->newsVideo()->delete();
            }
        });
    }



    public function source()
    {

        return $this->hasOne(source::class, 'id', 'Source');
    }
    public function condinent()
    {

        return $this->hasOne(condinent::class, 'id', 'Condinent');
    }

    public function country()
    {

        return $this->hasOne(country::class, 'id', 'Country');
    }

    public function category()
    {

        return $this->hasone(category::class, 'id', 'Category');
    }

    public function sub_category()
    {
        return $this->hasone(subCategory::class, 'id', 'SubCategory');
    }

    public function tags()
    {
        return $this->hasManyThrough(tags::class, newstags::class, 'News_id', 'id', 'id', 'tag_id');
    }
    //get product tags only
    public function newstags()
    {
        return $this->hasMany(newstags::class,'News_id','id');
    }

    public function newsImages()
    {
        return $this->hasOne(newsImages::class, 'News_id', 'id');
    }

    public function newsVideo()
    {

        return $this->hasone(newsVideo::class, 'News_id', 'id');
    }

    protected $appends = ['local','updated'];
    public function getlocalAttribute()
    {
            return date('d-m-Y', strtotime($this->created_at));
    }
    public function getupdatedAttribute(){
        return Carbon::parse($this->updated_at)->diffForHumans();
    }

    //get previous news
    public function get_previous_news(){
        return news::where([['Category','=',$this->Category],['id','<',$this->id]])->limit(3)->get(); 
    }

    //comments

    public function commends()
    {
        return $this->hasmany(commends::class, 'news_id', 'id')->where('status',1);
    }

}
