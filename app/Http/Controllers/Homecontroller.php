<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    //

     public function index(){

       $getservice = \App\Models\Service::where('status',1)->get();
       $getsocial = \App\Models\Social::where('status',1)->get();
       $getdoctors = \App\Models\Doctors::where('status',1)->get();
       $getdepartment = \App\Models\Department::where('status',1)->get();

       return view('index',compact('getservice','getsocial','getdoctors','getdepartment'));
    }

     public function about(){

        $getachievement = \App\Models\Achievement::where('status',1)->get();
        $getdoctors = \App\Models\Doctors::where('status',1)->get();
        $getdepartment = \App\Models\Department::where('status',1)->get();

       return view('front.about',compact('getachievement','getdoctors','getdepartment'));
    }

    public function blogsidebar(){

        $getcategories = \App\Models\Categories::where('status',1)->get();
        $gettags = \App\Models\Tags::where('status',1)->get();
        $getblogs = \App\Models\Blog::where('status',1)->get();
        $getblogspp = \App\Models\Blog::where('status',1)->where('popular_post',1)->get();

        return view('front.blog-sidebar',compact('getcategories','gettags','getblogs','getblogspp'));
     }



     public function blogedit($parameter){

        $geteditblog = \App\Models\Blog::where('id',$parameter)->firstOrfail();

        $getcategories = \App\Models\Categories::where('status',1)->get();
        $gettags = \App\Models\Tags::where('status',1)->get();
        $getblogs = \App\Models\Blog::where('status',1)->get();
        $getblogspp = \App\Models\Blog::where('status',1)->where('popular_post',1)->get();

        return view('front.blog-singlepage',compact('geteditblog','getcategories','gettags','getblogs','getblogspp'));
     }

    public function savecreate(Request $request){

        $obj = new \App\Models\Newslater;
        $obj->email = $request->email;

        $obj->save();

        return redirect()->route('front')->with('message','Data added Successfully');

       }


    public function saveappointment(Request $request){

        $obj = new \App\Models\Appointment;
        $obj->department = $request->department;
        $obj->doctors = $request->doctors;
        $obj->date = $request->date;
        $obj->time = $request->time;
        $obj->name = $request->name;
        $obj->number = $request->phone;
        $obj->message = $request->message;

        $obj->save();

        return redirect()->route('front.appointment')->with('message','Data added Successfully');

       }

       public function service(){

        $getservice = \App\Models\Service::where('status',1)->get();

        return view('front.service',compact('getservice'));
       }

       public function department(){

        $getdepartment = \App\Models\Department::where('status',1)->get();

        return view('front.department',compact('getdepartment'));
       }

       public function departmentedit($parametr){

        $geteditdepartment = \App\Models\Department::where('id',$parametr)->firstOrfail();

        return view('front.department-single',compact('geteditdepartment'));
       }

       public function doctors(){

        $getdoctors = \App\Models\Doctors::where('status',1)->get();

        return view('front.doctors',compact('getdoctors'));
       }

       public function doctorsedit($parameter){

        $getdoctorsedit = \App\Models\Doctors::where('id',$parameter)->firstOrfail();

        return view('front.doctors-single',compact('getdoctorsedit'));
       }

       public function appointment(){

        $getdoctors = \App\Models\Doctors::where('status',1)->get();
        $getdepartment = \App\Models\Department::where('status',1)->get();

        return view('front.appointment',compact('getdoctors','getdepartment'));
       }

       public function contact(){

        return view('front.contact');
       }

       public function savecontact(Request $request){

        $obj = new \App\Models\Contact;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->query_data = $request->subject;
        $obj->number = $request->phone;
        $obj->message = $request->message;

        $obj->save();


        return redirect()->route('front.contact')->with('message','Data added Successfully');
       }





}
