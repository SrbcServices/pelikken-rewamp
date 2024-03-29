<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news;
use App\Models\category;


class subCategory extends Model
{
    use HasFactory;
    public function news(){

        return $this->belongstoMany(news::class);
    }


    public function category() {

        return $this->hasOne(category::class, 'id','category_id');
    }


    public function subcategory(){

        return $this->belongstoMany(category::class);
    }
    public function get_news(){
        return $this->hasMany(news::class,'SubCategory','id');
    }


}
