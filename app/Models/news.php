<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\source;

class news extends Model
{
    use HasFactory;

    public function source(){

       return $this->hasOne(source::class,'id','news_id');
    }
    public function condinent(){

        return $this->hasOne(condinent::class,'id','news_id');
        
     }

     public function country(){

        return $this->hasOne(country::class,'id','news_id');
        
     }

     public function category(){

        return $this->hasone(category::class,'id','news_id');
     }

     public function sub_category(){
         return $this->hasone(subCategory::class,'id','news_id');
     }

     public function tags(){
         return $this->hasone(tags::class,'id','news_id');
     }

     public function newsImages(){
         return $this->hasmany(newsImages::class,'id','news_id');
     }

     public function newsVideo(){
         
         return $this->hasone(newsVideo::class,'id','news_id');
     }
}


