<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Socialcontroller extends Controller
{
    //
    public function listing(){


    	return view('social.listing');
    }

    public function ajaxlisting(Request $request){

        $sql= \App\Models\Social::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('icon',function($data){

                return $data->icon;

            })

            ->editColumn('name',function($data){

                return $data->name;
            })

            ->editColumn('link',function($data){

                return $data->link;
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

             })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('social.edit',$data->id).'">Edit</a> <a href="'.route('social.delete',$data->id).'">Delete</a>';

                return $obj;
              })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','icon','name','link','status','action'])
            ->make(true);

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

