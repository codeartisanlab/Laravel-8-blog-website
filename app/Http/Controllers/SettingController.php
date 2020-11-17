<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    function index(){
    	$setting=Setting::first();
    	return view('backend.setting.index',['setting'=>$setting]);
    }
    // Store
    function save_settings(Request $request){
    	$countData=Setting::count();
    	if($countData==0){
	    	$data=new Setting;
	        $data->comment_auto=$request->comment_auto;
	        $data->user_auto=$request->user_auto;
	        $data->recent_limit=$request->recent_limit;
	        $data->popular_limit=$request->popular_limit;
	        $data->recent_comment_limit=$request->recent_comment_limit;
	        $data->save();
	    }else{
	    	$firstData=Setting::first();
	    	$data=Setting::find($firstData->id);
	        $data->comment_auto=$request->comment_auto;
	        $data->user_auto=$request->user_auto;
	        $data->recent_limit=$request->recent_limit;
	        $data->popular_limit=$request->popular_limit;
	        $data->recent_comment_limit=$request->recent_comment_limit;
	        $data->save();
	    }

        return redirect('admin/setting')->with('success','Data has been updated.');
    }
}
