<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsVideo extends Model
{
    use HasFactory;
    
    public function news(){
        return $this->belongstoMany(news::class);
    }
}
