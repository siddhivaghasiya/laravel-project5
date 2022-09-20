<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Socialcontroller extends Controller
{
    //
    public function listing(){

        $getsocial =  \App\Models\Social::simplepaginate(4);

    	return view('social.listing',compact('getsocial'));
    }

    public function create(){

    	return view('social.add');
    }

    public function savecreate(Request $request){

        $obj = new \App\Models\Social;
        $obj->icon = $request->icon;
        $obj->name = $request->name;
        $obj->link = $request->link;
        $obj->status = $request->status;

        $obj->save();

    	return redirect()->route('social.listing');

    }

    public function edit($parameter){

        $editdata =  \App\Models\Social::where('id',$parameter)->firstOrfail();

    	return view('social.edit',compact('editdata'));
    }

    public function update(Request $request,$parameterid){

        $obj =  \App\Models\Social::where('id',$parameterid)->first();
        $obj->icon = $request->icon;
        $obj->name = $request->name;
        $obj->link = $request->link;
        $obj->status = $request->status;

        $obj->save();

    	return redirect()->route('social.listing');

    }

    public function delete($parameterId){

        $obj =  \App\Models\Social::where('id',$parameterId)->first();
        $obj->delete();

    	return redirect()->route('social.listing');
    }
}

