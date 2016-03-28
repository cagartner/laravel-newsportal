<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'link', 'summary', 'subject', 'status', 'comments_status', 'author', 'publish_facebook', 'advantage', 'views', 'user_id'];

    public function news_section(){
        return $this->belongsTo('App\Section');
    }

    public function tags(){
        return $this->hasMany('App\News_tags');   
    }

    public function palbums(){
        return $this->hasMany('App\News_photo_album');   
    }

    public function valbums(){
        return $this->hasMany('App\News_video_album');   
    }

    public function features(){
        return $this->hasMany('App\News_features');   
    }

    public function sections(){
        return $this->hasMany('App\News_sections');   
    }

    public function basic_photo(){
        return $this->hasMany('App\NewsBasicPhoto');   
    }
}
