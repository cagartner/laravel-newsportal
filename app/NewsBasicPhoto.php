<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsBasicPhoto extends Model
{
    protected $table = 'news_basic_photos';

    protected $fillable = ['news_id', 'image', 'original_size', 'small', 'thumbnail', 'medium', 'large'];

    public function basic_photo(){
        return $this->belongsTo('App\News');
    }
}
