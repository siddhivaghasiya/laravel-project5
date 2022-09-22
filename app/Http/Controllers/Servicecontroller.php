<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Servicecontroller extends Controller
{
    //

    public function listing(){

    	return view('service.listing');

    }


    public function ajaxlisting(Request $request){

        $sql= \App\Models\Service::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('image',function($data){

                return '<img src="'.\asset('uploads/service').'/'.$data->image.'" class="ab">';
            })

            ->editColumn('service_name',function($data){

                return $data->service_name;
            })

            ->editColumn('description',function($data){

                return $data->description;
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

             })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('service.edit',$data->id).'">Edit</a> <a href="'.route('service.delete',$data->id).'">Delete</a>';

                return $obj;
              })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','image','service_name','description','status','action'])
            ->make(true);

        }
     public function create(){

    	return view('service.add');
    }

      public function savecreate(Request $request){

        $request->validate([
            'image' => 'required',
            'service_name' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);

    	$obj = new \App\Models\Service;
        $obj->image = $request->image;
        $obj->service_name = $request->service_name;
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

        $request->validate([
            'image' => 'required',
            'service_name' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);

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
