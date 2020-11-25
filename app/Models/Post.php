<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    function comments(){
    	return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }

    function category(){
    	return $this->belongsTo('App\Models\Category','cat_id');
    }
}
