<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Blogcontroller extends Controller
{
    //

    public function listing(){

        return view('blog.blog.listing');

    }


    public function ajaxlisting(Request $request){

        $sql= \App\Models\Blog::select("*");
        return Datatables::of($sql)

            ->editColumn('id',function($data){
                return $data->id;
            })

            ->editColumn('image',function($data){
                return '<img src="'.\asset('uploads/blog').'/'.$data->image.'" class="ab">';
            })

            ->editColumn('title',function($data){
                  return $data->title;
              })

            ->editColumn('description',function($data){
                return $data->description;
               })

            ->editColumn('popular_post',function($data){

                if($data->popular_post == 1){

                    return 'yes';

                }else{

                    return 'no';


                }
            })

            ->editColumn('categories',function($data){

                $getcategories = \App\Models\Categories::where('id',$data->categories)->first();


                return $getcategories->categories;
            })

            ->editColumn('tags',function($data){

                $gettags = \App\Models\Tags::where('id',$data->tags)->first();


                return $gettags->tags;
            })

            ->editColumn('status',function($data){

                if($data->status == 1){

                    return 'Active';

                }else{

                    return 'Inactive';


                }

            })
            ->addColumn('action',function($data){

                  $obj = ' <a href="'.route('blog.edit',$data->id).'">Edit</a> <a href="'.route('blog.delete',$data->id).'">Delete</a>';
                return $obj;
            })

              ->filter(function ($query) use ($request) {


              })
              ->rawColumns(['id','image','title','description','popular_post','categories','tags','status','action'])
              ->make(true);

    }

    public function create(){

    	$getallcategories = \App\Models\Categories::get();
    	$getalltags = \App\Models\Tags::get();

    	return view('blog.blog.add',compact('getallcategories','getalltags'));
    }

    public function savecreate(Request $request){

        $obj = new \App\Models\Blog;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->popular_post = $request->p_post;
        $obj->categories = $request->categories ;
        $obj->tags = $request->tags ;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/blog/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/blog/', $filename);

            $obj->image = $filename;


        }

        $obj->save();

    	return redirect()->route('blog.listing');
    }

     public function edit($parameter){

        $getallcategories = \App\Models\Categories::get();
    	$getalltags = \App\Models\Tags::get();
        $editdata = \App\Models\Blog::where('id',$parameter)->first();

     return view('blog.blog.edit',compact('editdata','getallcategories','getalltags'));
    }

     public function update(Request $request){

        $obj =  \App\Models\Blog::where('id',$request->blog)->first();
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->popular_post = $request->p_post;
        $obj->categories = $request->categories ;
        $obj->tags = $request->tags ;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/blog/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/blog/', $filename);

            $obj->image = $filename;


        }

        $obj->save();


    	return redirect()->route('blog.listing');
    }

    public function delete($parameterid){

       $geteditdata = \App\Models\Blog::where('id',$parameterid)->first();
       $geteditdata->delete();
    	return redirect()->route('blog.listing');
    }
}
