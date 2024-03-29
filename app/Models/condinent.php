<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use PhpParser\Builder\Function_;

class condinent extends Model
{
    use HasFactory;

    public function news(){

        return $this->belongstoMany(news::class);
    }
    public Function country(){
        
        return $this->hasMany(Country::class);
    }
    public function get_news(){
        return $this->hasmany(news::class,'Condinent','id');
    }
}
