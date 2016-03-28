<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisement';

    protected $fillable = ['user_id', 'title', 'start', 'end', 'cost', 'discount', 'comment', 'status', 'position', 'renewal'];

	public function images(){
        return $this->hasMany('App\AdvertisementImages');   
    }
}
