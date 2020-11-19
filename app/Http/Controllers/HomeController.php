<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    function home(){
    	$posts=Post::all();
        return view('home',['posts'=>$posts]);
    }
}
