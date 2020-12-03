<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class AdminController extends Controller
{
    // Login View
    function login(){
    	return view('backend.login');
    }
    // Submit Login
    function submit_login(Request $request){
    	$request->validate([
    		'username'=>'required',
    		'password'=>'required'
    	]);

    	$userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
    	if($userCheck>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
            session(['adminData'=>$adminData]);
    		return redirect('admin/dashboard');
    	}else{
    		return redirect('admin/login')->with('error','Invalid username/password!!');
    	}

    }
    // Dashboard
    function dashboard(){
        $posts=Post::orderBy('id','desc')->get();
    	return view('backend.dashboard',['posts'=>$posts]);
    }

    // Show all users
    function users(){
        $data=User::orderBy('id','desc')->get();
        return view('backend.user.index',['data'=>$data]);
    }

    public function delete_user($id)
    {
        User::where('id',$id)->delete();
        return redirect('admin/user');
    }

    // Show all comments
    function comments(){
        $data=Comment::orderBy('id','desc')->get();
        return view('backend.comment.index',['data'=>$data]);
    }

    public function delete_comment($id)
    {
        Comment::where('id',$id)->delete();
        return redirect('admin/comment');
    }

    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
