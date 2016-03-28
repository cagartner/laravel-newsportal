<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_photo_album_photos extends Model
{
    protected $table = 'news_photo_album_photos';

    protected $fillable = ['news_photo_album_id', 'image', 'original_size', 'small', 'thumbnail', 'medium', 'large'];

    public function palbums_photos(){
        return $this->belongsTo('App\News_photo_album');
    }
}
