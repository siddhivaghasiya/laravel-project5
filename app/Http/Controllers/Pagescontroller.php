<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagescontroller extends Controller
{
    //

    public function listing(){

    	$getallpages = \App\Models\Pages::simplepaginate(5);

    	return view('pages.listing',compact('getallpages'));
    }

    public function create(){

    	return view('pages.add');
    }

    public function savecreate(Request $request){

        $obj = new \App\Models\Pages;
        $obj->name = $request->name;
        $obj->title = $request->title;
        $obj->url = $request->url;
        $obj->image = $request->image;
        $obj->shortdescription = $request->shortdescription;
        $obj->longdescription = $request->longdescription;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {
           
            // @unlink('uploads/pages/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/pages/', $filename);

            $obj->image = $filename;
        }
       
        $obj->save();

    	return redirect()->route('pages.listing');
    }

     public function edit($parameter){

       $editdata = \App\Models\Pages::where('id',$parameter)->first();

    	return view('pages.edit',compact('editdata'));
    }

    public function update(Request $request,$parameterid){

        $obj =  \App\Models\Pages::where('id',$parameterid)->first();
        $obj->name = $request->name;
        $obj->title = $request->title;
        $obj->url = $request->url;
        $oldimage = $obj->image;
        $obj->image = $request->image;
        $obj->shortdescription = $request->shortdescription;
        $obj->longdescription = $request->longdescription;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {
           
            @unlink('uploads/pages/' . $oldimage);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/pages/', $filename);

            $obj->image = $filename;
        }
       
        $obj->save();

    	return redirect()->route('pages.listing');
    }

      public function delete($parameterId){

       $editdata = \App\Models\Pages::where('id',$parameterId)->first();
       @unlink('uploads/pages/' . $editdata->image);
       $editdata->delete();

    	return redirect()->route('pages.listing');
    }

}
