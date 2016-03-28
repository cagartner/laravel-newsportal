<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisementImages extends Model
{
    protected $table = 'advertisement_images';

    protected $fillable = ['advertisement_id', 'image', 'original_size', 'small', 'thumbnail', 'medium', 'large'];

    public function images(){
        return $this->belongsTo('App\Advertisement');
    }
}
