<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news;

class source extends Model
{
    public function news(){
        return $this->belongstoMany(news::class);
    }
}
