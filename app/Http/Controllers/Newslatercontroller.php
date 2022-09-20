<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Newslatercontroller extends Controller
{
    //

    public function listing(){

        $getnewslater =  \App\Models\Newslater::get();

        return view('newslater.listing',compact('getnewslater'));
     }

     public function delete($parameterId){

        $obj = \App\Models\Newslater::where('id', $parameterId)->first();
       $obj->delete();

      return redirect()->route('newslater.listing');
   }
}
