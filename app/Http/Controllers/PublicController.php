<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // index
    public function index()
    {
        return view('index');
    }

    // about us
    public function about_us()
    {
        return view('about_us');
    }

    // events
    public function events()
    {
        return view('events', [
            'events' => Event::all()
        ]);
    }

    // event
    public function event(Event $event)
    {
        return view('event', [
            'event' => $event
        ]);
    }

    // membership
    public function membership()
    {
        return view('membership');
    }

    // appliction
    public function application()
    {
        return view('application');
    }

    // contact us
    public function contact_us()
    {
        return view('contact_us');
    }

    // privacy statement
    public function privacy_statement()
    {
        return view('privacy_statement');
    }
}
