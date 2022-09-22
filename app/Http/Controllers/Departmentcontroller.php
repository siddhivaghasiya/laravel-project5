<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Departmentcontroller extends Controller
{
    //

    public function listing(){



      return view('department.listing');
    }

    public function yajaralisting(Request $request){


        $sql= \App\Models\Department::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('title',function($data){
                  return $data->title;
              })

            ->editColumn('description',function($data){
                return $data->description;
               })

            ->editColumn('small_description',function($data){
                return $data->small_description;
            })

            ->editColumn('number',function($data){
                return $data->number;
            })

            ->editColumn('image',function($data){
                return '<img src="'.\asset('uploads/department').'/'.$data->image.'" class="ab" >';
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

            })
            ->addColumn('action',function($data){

                  $obj = ' <a href="'.route('department.edit',$data->id).'">Edit</a> <a href="'.route('department.delete',$data->id).'">Delete</a>';
                return $obj;
            })

              ->filter(function ($query) use ($request) {


              })
              ->rawColumns(['id','title','description','small_description','number','image','status','action'])
              ->make(true);
    }

    public function create(){

      return view('department.add');
    }

    public function savecreate(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'small_description' => 'required',
            'number' => 'required',
            'status' => 'required',
            'image' => 'required',

        ]);

      $obj = new \App\Models\Department;
      $obj->title = $request->title;
      $obj->description = $request->description;
      $obj->small_description = $request->small_description;
      $obj->number = $request->number;
      $obj->status = $request->status;
          /**database field name/form name**/

     $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/department/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/department/', $filename);

            $obj->image = $filename;

        }

      $obj->save();

      return redirect()->route('department.listing');
    }

    public function edit($parameter){

    	$geteditdata = \App\Models\Department::where('id',$parameter)->first();

      return view('department.edit',compact('geteditdata'));
    }

    public function update(Request $request,$paramterId){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'small_description' => 'required',
            'number' => 'required',
            'status' => 'required',
            'image' => 'required',

        ]);

      $obj =  \App\Models\Department::where('id',$paramterId)->first();
      $obj->title = $request->title;
      $obj->description = $request->description;
      $obj->small_description = $request->small_description;
      $obj->number = $request->number;
      $obj->status = $request->status;
          /**database field name/form name**/

     $img = $request->file('image');

        if ($request->hasFile('image')) {

             @unlink('uploads/department/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/department/', $filename);

            $obj->image = $filename;

        }

      $obj->save();
      return redirect()->route('department.listing');
    }

    public function delete($parameterid){

       $obj = \App\Models\Department::where('id',$parameterid)->first();

       $obj->delete();

    	return redirect()->route('department.listing');
    }
}
