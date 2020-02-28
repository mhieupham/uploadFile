<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadfileController extends Controller
{
    //
    function index(){
        return view('upload');
    }
    function upload(Request $request){
        $this->validate($request,[
            'file'=>'required|image|mimes:jpeg,png,jpg'
        ]);
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_name);
        return back()->with('success','Add Image Success')->with('path',$new_name);
    }
}
