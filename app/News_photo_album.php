<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_photo_album extends Model
{
    protected $table = 'news_photo_album';

    protected $fillable = ['news_id', 'name', 'photographer', 'summary', 'subject', 'publish_on_home'];

    public function palbums(){
        return $this->belongsTo('App\News');
    }

    public function palbums_photos(){
        return $this->hasMany('App\News_photo_album_photos');
    }
}
