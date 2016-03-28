<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title', 'body'];

    public function author()
    {
    	return $this->belongsTo('App\User', 'created_by');
    }
}
