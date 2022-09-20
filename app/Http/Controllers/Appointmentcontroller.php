<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Appointmentcontroller extends Controller
{
    //

    public function listing(){

        $getappointment =  \App\Models\Appointment::get();

        return view('appointment.listing',compact('getappointment'));
     }

     public function delete($parameterId){

        $obj = \App\Models\Appointment::where('id', $parameterId)->first();
       $obj->delete();

      return redirect()->route('appointment.listing');
   }
}
