<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Appointmentcontroller extends Controller
{
    //

    public function listing(){

        return view('appointment.listing');

     }
     public function ajaxlisting(Request $request){

        $sql= \App\Models\Appointment::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('department',function($data){

                $getdepartment = \App\Models\Department::where('id',$data->department)->first();
                if($getdepartment !=null){

                    return $getdepartment->title;

                }else{

                    return "";
                }

            })

            ->editColumn('doctors',function($data){

                $getdoctors = \App\Models\Doctors::where('id',$data->doctors)->first();

                if($getdoctors !=null){

                    return $getdoctors->name;

                }else{

                    return "";
                }
            })

            ->editColumn('date',function($data){

                return $data->date;
            })

            ->editColumn('time',function($data){

                return $data->time;

            })

            ->editColumn('number',function($data){

                return $data->number;

            })

            ->editColumn('message',function($data){

                return $data->message;

            })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('appointment.delete',$data->id).'">Delete</a>';

                return $obj;
              })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','department','doctors','date','time','number','message','action'])
            ->make(true);

        }
     public function delete($parameterId){

        $obj = \App\Models\Appointment::where('id', $parameterId)->first();
       $obj->delete();

      return redirect()->route('appointment.listing');
   }
}
