<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class Tagscontroller extends Controller
{
    //

     public function listing(){



    	return view('blog.tages.listing');
    }

    public function ajaxlisting(Request $request){

        $sql= \App\Models\Tags::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('tags',function($data){

                return $data->tags;
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

            })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('tag.edit',$data->id).'">Edit</a> <a href="'.route('tag.delete',$data->id).'">Delete</a>';
              return $obj;
          })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','tags','status','action'])
            ->make(true);

        }

     public function create(){

    	return view('blog.tages.add');
    }


    public function savecreate(Request $request){

    	$obj = new \App\Models\Tags;
        $obj->tags = $request->tags;
        $obj->status = $request->status;
          /**database field name/form name**/
        $obj->save();

    	return redirect()->route('tag.listing');
    }

    public function edit($parameter){

       $geteditdata = \App\Models\Tags::where('id',$parameter)->firstOrfail();

        return view('blog.tages.edit',compact('geteditdata'));
    }

      public function update(Request $request){

    	$obj =  \App\Models\Tags::where('id',$request->tages)->first();
        $obj->tags = $request->tags;
        $obj->status = $request->status;
          /**database field name/form name**/
        $obj->save();

    	return redirect()->route('tag.listing');
    }

     public function delete($parameterid){

       $geteditdata = \App\Models\Tags::where('id',$parameterid)->first();
       $geteditdata->delete();

    	return redirect()->route('tag.listing');
    }

}
