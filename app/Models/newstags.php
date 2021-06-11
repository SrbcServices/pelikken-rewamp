<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\news;

class newstags extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function news_frome_tags(){
        return $this->hasMany(news::class,'id','tag_id');
    }
}
