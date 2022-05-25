<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        return view('website.index');
    }

    public function about(){
        return view('website.about');
    }

    public function plans(){
        return view('website.plans');
    }

    public function contact(){
        return view('website.contact');
    }
}
