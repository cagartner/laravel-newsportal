<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_sections extends Model
{
    protected $table = 'news_sections';

    protected $fillable = ['news_id', 'section', 'status'];

    public function sections(){
        return $this->belongsTo('App\News');
    }

    public function mysections(){
        return $this->belongsToMany('App\Section');
    }
}
