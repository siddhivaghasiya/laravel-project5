<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class Doctorscontroller extends Controller
{
    //

    public function listing(){


    	return view('doctors.listing');
    }

    public function ajaxlisting(Request $request){

        $sql= \App\Models\Doctors::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('image',function($data){

                return '<img src="'.\asset('uploads/doctors').'/'.$data->image.'" class="ab">';
            })

            ->editColumn('name',function($data){

                return $data->name;
            })

            ->editColumn('position',function($data){

                return $data->position;
            })

            ->editColumn('description',function($data){

                return $data->description;
            })

            ->editColumn('department',function($data){

              $obj = \App\Models\Department::where('id',$data->department)->first();

         return $obj->title;
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

            })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('doctors.edit',$data->id).'">Edit</a> <a href="'.route('doctors.delete',$data->id).'">Delete</a>';
              return $obj;
          })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','image','name','position','description','department','status','action'])
            ->make(true);

        }


    public function create(){

    	$getdepartment = \App\Models\Department::pluck('title','id')->toarray();

    	return view('doctors.add',compact('getdepartment'));
    }


    public function savecreate(Request $request){

        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'department' => 'required',
            'status' => 'required',

        ]);

    	$obj = new \App\Models\Doctors;
        $obj->image = $request->image;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->description = $request->description ;
        $obj->department = $request->department ;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/doctors/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/doctors/', $filename);

            $obj->image = $filename;

        }

        $obj->save();

        return redirect()->route('doctors.add')->with('message','Data added Successfully');
    }

      public function edit($parameter){

    	$getdepartment = \App\Models\Department::pluck('title','id')->toarray();
    	 $getdoctors = \App\Models\Doctors::where('id',$parameter)->first();

    	return view('doctors.edit',compact('getdoctors','getdepartment'));
    }


    public function update(Request $request,$parameter){

        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'department' => 'required',
            'status' => 'required',

        ]);

    	$obj =  \App\Models\Doctors::where('id',$parameter)->first();
        $obj->image = $request->image;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->description = $request->description ;
        $obj->department = $request->department ;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

             @unlink('uploads/doctors/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/doctors/', $filename);

            $obj->image = $filename;

        }

        $obj->save();

        return redirect()->route('doctors.listing');
    }

    public function delete($parameterid){


        $obj = \App\Models\Doctors::where('id',$parameterid)->first();
        $obj->delete();

        return redirect()->route('doctors.listing');
    }
}
