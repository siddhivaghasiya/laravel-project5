<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Pagescontroller extends Controller
{
    //

    public function listing(){

    	return view('pages.listing');

    }
    public function ajaxlisting(Request $request){

        $sql= \App\Models\Pages::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('name',function($data){

                return $data->name;

            })

            ->editColumn('title',function($data){

                return $data->title;
            })

            ->editColumn('url',function($data){

                return $data->url;
            })


            ->editColumn('image',function($data){

                return '<img src="'.\asset('uploads/pages').'/'.$data->image.'" class="ab">';
            })


            ->editColumn('shortdescription',function($data){

                return $data->shortdescription;
            })

            ->editColumn('longdescription',function($data){

                return $data->longdescription;
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

             })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('pages.edit',$data->id).'">Edit</a> <a href="'.route('pages.delete',$data->id).'">Delete</a>';

                return $obj;
              })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','name','title','url','image','shortdescription','longdescription','status','action'])
            ->make(true);

        }

    public function create(){

    	return view('pages.add');
    }

    public function savecreate(Request $request){

        $obj = new \App\Models\Pages;
        $obj->name = $request->name;
        $obj->title = $request->title;
        $obj->url = $request->url;
        $obj->image = $request->image;
        $obj->shortdescription = $request->shortdescription;
        $obj->longdescription = $request->longdescription;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/pages/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/pages/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

    	return redirect()->route('pages.listing');
    }

     public function edit($parameter){

       $editdata = \App\Models\Pages::where('id',$parameter)->first();

    	return view('pages.edit',compact('editdata'));
    }

    public function update(Request $request,$parameterid){

        $obj =  \App\Models\Pages::where('id',$parameterid)->first();
        $obj->name = $request->name;
        $obj->title = $request->title;
        $obj->url = $request->url;
        $oldimage = $obj->image;
        $obj->image = $request->image;
        $obj->shortdescription = $request->shortdescription;
        $obj->longdescription = $request->longdescription;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/pages/' . $oldimage);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/pages/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

    	return redirect()->route('pages.listing');
    }

      public function delete($parameterId){

       $editdata = \App\Models\Pages::where('id',$parameterId)->first();
       @unlink('uploads/pages/' . $editdata->image);
       $editdata->delete();

    	return redirect()->route('pages.listing');
    }

}
