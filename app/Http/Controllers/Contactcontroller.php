<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contactcontroller extends Controller
{
    //

    public function listing(){
          
      $getallcontact = \App\Models\Contact::get();

      return view('contact.listing',compact('getallcontact'));
    }

    public function create(){

      return view('contact.add');
    }

    public function savecreate(Request $request){

     	$obj = new \App\Models\Contact;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->query_data = $request->query_data;
        $obj->number = $request->number;
        $obj->message = $request->message;
        $obj->status = $request->status;

        $obj->save();
 
       return redirect()->route('contact.listing');
    }

     public function edit($parameter){

     	$geteditdata = \App\Models\Contact::where('id', $parameter)->firstOrfail(); 

      return view('contact.edit',compact('geteditdata'));
    }


    public function update(Request $request,$parameterid){

     	$obj =  \App\Models\Contact::where('id',$parameterid)->first();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->query_data = $request->query_data;
        $obj->number = $request->number;
        $obj->message = $request->message;
        $obj->status = $request->status;

        $obj->save();
 
       return redirect()->route('contact.listing');
    }


     public function delete($parameterId){

     	$obj = \App\Models\Contact::where('id', $parameterId)->first(); 
        $obj->delete();
        
       return redirect()->route('contact.listing');
    }
}
