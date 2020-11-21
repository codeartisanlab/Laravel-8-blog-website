<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    function home(Request $request){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
    	if($request->has('q')){
    		$q=$request->q;
    		$posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(1);
    	}else{
    		$posts=Post::orderBy('id','desc')->paginate(1);
    	}
        return view('home',['posts'=>$posts]);
    }
}
