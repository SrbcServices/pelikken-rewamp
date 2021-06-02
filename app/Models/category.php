<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news;


class category extends Model
{
    use HasFactory;
    public function get_subcategories(){
        return $this->hasMany(subCategory::class);
    }

    public function news(){

        return $this->belongstoMany(news::class);
    }
}

