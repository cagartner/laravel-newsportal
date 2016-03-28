<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_features extends Model
{
    protected $table = 'news_features';

    protected $fillable = ['news_id', 'feature', 'status'];

    public function features(){
        return $this->belongsTo('App\News');
    }
}
