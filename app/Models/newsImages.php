<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class newsImages extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function news(){

        return $this->belongstoOne(news::class);
        
    }
}
