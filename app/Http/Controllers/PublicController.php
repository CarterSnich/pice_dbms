<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function about_us()
    {
        return view('about_us');
    }
    public function events()
    {
        return view('events');
    }
    public function membership()
    {
        return view('membership');
    }
    public function contact_us()
    {
        return view('contact_us');
    }
    public function privacy_statement()
    {
        return view('privacy_statement');
    }
}
