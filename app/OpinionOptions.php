<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpinionOptions extends Model
{
    protected $table = 'opinion_options';

    protected $fillable = ['opinion_id', 'option', 'counter', 'votes'];

    public function options(){
        return $this->belongsTo('App\Opinion');
    }
}
