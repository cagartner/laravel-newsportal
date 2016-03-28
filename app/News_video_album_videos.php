<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_video_album_videos extends Model
{
    protected $table = 'news_video_album_videos';

    protected $fillable = ['news_video_album_id', 'video'];

    public function valbums_videos(){
        return $this->belongsTo('App\News_video_album');
    }
}
