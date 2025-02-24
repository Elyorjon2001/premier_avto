<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller

{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function booking()
    {
        return view('booking');
    }

    public function car()
    {
        return view('car');
    }

    public function contact()
    {
        return view('contact');
    }

    public function detail()
    {
        return view('detail');
    }

    public function service()
    {
        return view('service');
    }

    public function team()
    {
        return view('team');
    }

    public function testmonial()
    {
        return view('testmonial');
    }
}
