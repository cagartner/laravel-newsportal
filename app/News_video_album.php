<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_video_album extends Model
{
    protected $table = 'news_video_album';

    protected $fillable = ['news_id', 'name', 'photographer', 'summary', 'subject', 'publish_on_home'];

    public function valbums(){
        return $this->belongsTo('App\News');
    }

    public function valbums_videos(){
        return $this->hasMany('App\News_video_album_videos');
    }
}
