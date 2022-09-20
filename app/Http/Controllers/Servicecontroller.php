<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Servicecontroller extends Controller
{
    //

    public function listing(){

    	$getallservice = \App\Models\Service::simplepaginate(5);

    	return view('service.listing',compact('getallservice'));
    }

     public function create(){

    	return view('service.add');
    }

      public function savecreate(Request $request){
    	 

    	$obj = new \App\Models\Service;
        $obj->image = $request->image;
        $obj->service_name = $request->name;
        $obj->description = $request->description ;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {
           
            // @unlink('uploads/service/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/service/', $filename);

            $obj->image = $filename;
            
        }
       
        $obj->save();

        return redirect()->route('service.listing');
    }

    public function edit($parameter){

    	$geteditdata = \App\Models\Service::where('id',$parameter)->firstOrfail();

      
      return view('service.edit',compact('geteditdata'));

    }


      public function update(Request $request,$parameterid){
    	 

    	$obj = \App\Models\Service::where('id',$parameterid)->first();
        $oldImage = $obj->image;
        $obj->image = $request->image;
        $obj->service_name = $request->name;
        $obj->description = $request->description;
        $obj->status = $request->status;

         $img = $request->file('image');

        if ($request->hasFile('image')) {
           
            @unlink('uploads/service/'.$oldImage);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/service/', $filename);

            $obj->image = $filename;
        }
       
        $obj->save();

        return redirect()->route('service.listing');
    }

      public function delete($parameterid){
           
           $obj = \App\Models\Service::where('id',$parameterid)->first();
           @unlink('uploads/service/'.$obj->image);

           $obj->delete();

          return redirect()->route('service.listing');
    }


}
