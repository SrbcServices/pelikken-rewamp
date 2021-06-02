<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsImages extends Model
{
    use HasFactory;

    public function news(){

        return $this->belongstoOne(news::class);
        
    }
}
