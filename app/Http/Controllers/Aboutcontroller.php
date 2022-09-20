<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aboutcontroller extends Controller
{
    //
    public function listing()
    {

        return view('about.listing-about');
    }

    public function create()
    {

        return view('about.add-about');
    }
}