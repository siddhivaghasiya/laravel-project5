<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Categoriescontroller extends Controller
{
    //
     public function listing(){



    	return view('blog.Categories.listing');
    }


    public function ajaxlisting(Request $request){

        $sql= \App\Models\Categories::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('categories',function($data){

                return $data->categories;
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

            })

            ->addColumn('action',function($data){

                $obj = ' <a href="'.route('categories.edit',$data->id).'">Edit</a> <a href="'.route('categories.delete',$data->id).'">Delete</a>';
              return $obj;
          })

            ->filter(function ($query) use ($request) {


            })
            ->rawColumns(['id','categories','status','action'])
            ->make(true);

        }

     public function create(){

    	return view('blog.Categories.add');
    }

    public function savecreate(Request $request){

        $request->validate([
            'categories' => 'required',
            'status' => 'required',
        ]);


    	$obj = new \App\Models\Categories;
        $obj->categories = $request->categories;
        $obj->status = $request->status;
          /**database field name/form name**/
        $obj->save();

    	return redirect()->route('categories.listing');
    }

    public function edit($parameter){

       $geteditdata = \App\Models\Categories::where('id',$parameter)->first();

        return view('blog.categories.edit',compact('geteditdata'));
    }

     public function update(Request $request,$parameterId){

        $request->validate([
            'categories' => 'required',
            'status' => 'required',
        ]);

    	$obj =  \App\Models\Categories::where('id',$parameterId)->first();
        $obj->categories = $request->categories;
        $obj->status = $request->status;
          /**database field name/form name**/
        $obj->save();

    	return redirect()->route('categories.listing');
    }

     public function delete($parameterid){

       $geteditdata = \App\Models\Categories::where('id',$parameterid)->first();
       $geteditdata->delete();
    	return redirect()->route('categories.listing');
    }

}
