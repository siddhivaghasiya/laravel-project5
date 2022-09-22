<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class Achievementcontroller extends Controller
{
    //

    public function listing(){


        return view('achievement.listing');
    }

    public function ajaxlisting(Request $request){

        $sql= \App\Models\Achievement::select("*");

        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('image',function($data){
                return '<img src="'.\asset('uploads/achievement').'/'.$data->image.'" class="ab">';
            })


            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

            })
            ->addColumn('action',function($data){

                  $obj = ' <a href="'.route('achievement.edit',$data->id).'">Edit</a> <a href="'.route('achievement.delete',$data->id).'">Delete</a>';
                return $obj;
            })

              ->filter(function ($query) use ($request) {


              })
              ->rawColumns(['id','image','status','action'])
              ->make(true);

    }

    public function create(){

        return view('achievement.add');
    }

    public function savecreate(Request $request){

        $request->validate([
            'image' => 'required',
            'status' => 'required',

        ], [
            'image.required' => 'image is required',
            'status.required' => 'status is required',

        ]);

        $obj = new \App\Models\Achievement;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/blog/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/achievement/', $filename);

            $obj->image = $filename;


        }

        $obj->save();

    	return redirect()->route('achievement.listing');
    }

    public function edit($parameter){

        $geteditdata = \App\Models\Achievement::where('id',$parameter)->firstOrfail();

        return view('achievement.edit',compact('geteditdata'));
    }

    public function update(Request $request,$parameterid){

        $request->validate([
            'image' => 'required',
            'status' => 'required',

        ], [
            'image.required' => 'image is required',
            'status.required' => 'status is required',

        ]);

    	$obj = \App\Models\Achievement::where('id',$parameterid)->first();
        $oldImage = $obj->image;
        $obj->image = $request->image;
        $obj->status = $request->status;

         $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/achievement/'.$oldImage);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/achievement/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return redirect()->route('achievement.listing');
    }

    public function delete($parameterId){

        $obj = \App\Models\Achievement::where('id',$parameterId)->first();
        @unlink('uploads/achievement/'.$obj->image);

        $obj->delete();

       return redirect()->route('achievement.listing');
 }



}
