<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Achievementcontroller extends Controller
{
    //

    public function listing(){

        $getachievement = \App\Models\Achievement::simplepaginate(5);

        return view('achievement.listing',compact('getachievement'));
    }

    public function create(){

        return view('achievement.add');
    }

    public function savecreate(Request $request){

        $obj = new \App\Models\Achievement;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/blog/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/achievement/', $filename);

            $obj->image = $filename;


        }

        $obj->save();

    	return redirect()->route('achievement.add');
    }

    public function edit($parameter){

        $geteditdata = \App\Models\Achievement::where('id',$parameter)->firstOrfail();

        return view('achievement.edit',compact('geteditdata'));
    }

    public function update(Request $request,$parameterid){


    	$obj = \App\Models\Achievement::where('id',$parameterid)->first();
        $oldImage = $obj->image;
        $obj->image = $request->image;
        $obj->status = $request->status;

         $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/achievement/'.$oldImage);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/achievement/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('achievement.listing');
    }

    public function delete($parameterId){

        $obj = \App\Models\Achievement::where('id',$parameterId)->first();
        @unlink('uploads/achievement/'.$obj->image);

        $obj->delete();

       return redirect()->route('achievement.listing');
 }



}
