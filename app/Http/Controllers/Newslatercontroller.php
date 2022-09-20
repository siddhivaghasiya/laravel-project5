<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Newslatercontroller extends Controller
{
    //

    public function listing(){

     return view('newslater.listing');

     }

     public function ajaxlisting(Request $request){

        $sql= \App\Models\Newslater::select("*");

        return Datatables::of($sql)

            ->editColumn('id',function($data){

                return $data->id;

            })

            ->editColumn('email',function($data){

                return $data->email;

            })

           ->addColumn('action',function($data){

                $obj = ' <a href="'.route('newslater.delete',$data->id).'">Delete</a> ';

                return $obj;
              })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','email','action'])
            ->make(true);

        }

     public function delete($parameterId){

        $obj = \App\Models\Newslater::where('id', $parameterId)->first();
       $obj->delete();

      return redirect()->route('newslater.listing');
   }
}
