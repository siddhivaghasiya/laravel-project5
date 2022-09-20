<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Contactcontroller extends Controller
{
    //

    public function listing(){


      return view('contact.listing');
    }

    public function ajaxlisting(Request $request){

        $sql= \App\Models\Contact::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('name',function($data){

                return $data->name;

            })

            ->editColumn('email',function($data){

                return $data->email;
            })

            ->editColumn('query_data',function($data){

                return $data->query_data;
            })


            ->editColumn('number',function($data){

                return $data->number;
            })


            ->editColumn('message',function($data){

                return $data->message;
            })


            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

             })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('contact.edit',$data->id).'">Edit</a> <a href="'.route('contact.delete',$data->id).'">Delete</a>';

                return $obj;
              })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','name','email','query_data','number','message','status','action'])
            ->make(true);

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
