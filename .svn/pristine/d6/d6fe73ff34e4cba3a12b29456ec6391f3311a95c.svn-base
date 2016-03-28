<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = ['name', 'activation'];

    public function news_section(){
        return $this->hasMany('App\News');   
    }

    public function mysections(){
        return $this->hasMany('App\News_sections', 'section');   
    }
}
