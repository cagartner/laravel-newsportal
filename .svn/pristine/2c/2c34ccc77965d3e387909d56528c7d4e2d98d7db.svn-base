<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['name', 'description'];

    public function users(){
        return $this->hasMany('App\User');   
    }
}
