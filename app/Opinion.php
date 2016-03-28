<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $table = 'opinion';

    protected $fillable = ['question', 'user_id', 'status', 'votes'];

	public function options(){
        return $this->hasMany('App\OpinionOptions');   
    }
}
