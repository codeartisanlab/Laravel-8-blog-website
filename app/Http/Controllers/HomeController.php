<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    function home(){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
    	$posts=Post::orderBy('id','desc')->paginate(1);
        return view('home',['posts'=>$posts]);
    }
}
