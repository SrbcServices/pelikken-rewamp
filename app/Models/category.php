<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news;
use App\Models\subCategory;


class category extends Model
{
    use HasFactory;
    public function get_subcategories(){
        return $this->hasMany(subCategory::class);
    }

    public function news(){

        return $this->belongstoMany(news::class);
    }

    public function sub_category(){

        return $this->hasOne(subCategory::class,'id','news_id');
        
     }
}

