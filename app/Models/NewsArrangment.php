<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArrangment extends Model
{
    use HasFactory;

    public function get_category(){
        return $this->hasOne(category::class,'id','category');
    }
}
