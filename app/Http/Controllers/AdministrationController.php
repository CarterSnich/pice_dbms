<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\EventsCarousel;
use Illuminate\Support\Facades\Auth;

class AdministrationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | administration routes
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request) // administration authentication
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if ($member = Member::where('email', '=', $request->email)->first()) {
            if ($member->role !== 'member' && auth('administrator')->attempt($formFields)) {
                $request->session()->regenerate();
                $administrator = $member;
                $administrator->createToken('AuthToken');

                switch ($administrator->role) {
                    case 'super_admin':
                    case 'president':
                    case 'vice_president':
                    case 'secretary':
                        return redirect()->intended('/administration/members');

                    case 'treasurer':
                        return redirect()->intended('/administration/membership_fees');

                    case 'information_officer':
                        return redirect()->intended('/administration/events');                 

                    default:
                        return redirect()->intended('/');
                }
            }
        }


        return back()->withErrors([
            'invalid_credentials' => 'Invalid credentials.'
        ])->withInput();
    }

    public function logout(Request $request) // administrator user logout
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }

    /*
    |--------------------------------------------------------------------------
    | administration pages
    |--------------------------------------------------------------------------
    */

    // login page
    public function login() // admin login page
    {
        return view('administration.login');
    }

    // members page
    public function members(Request $request) // members page
    {
        // dd($request->get('membership'));
        if (!$request->has('membership') || $request->get('membership') == 'all') {
            $members = Member::where('role', '=', 'member')->get();
        } else {
            $members = Member::where('role', '=', 'member')
                ->where('membership', '=', $request->get('membership'))
                ->get();
        }

        return view('administration.members', [
            'members' => $members
        ]);
    }

    // apllications page
    public function applications(Request $request)
    {
        return view('administration.applications', [
            'applications' => Application::where('status', '=', $request['status'])->get()
        ]);
    }

    // membership fees
    public function membership_fees()
    {
        return
            view('administration.membership_fees', [
                'applications' => Application::where([
                    ['status', '=', 'pending'],
                    ['date_paid', '=', null]
                ])->get()
            ]);
    }

    // events page
    public function events()
    {
        return view('administration.events', [
            'events' => Event::all()
        ]);
    }

    // events carousel 
    public function events_carousel()
    {
        return view('administration.events-carousel', [
            'carousel_images' => EventsCarousel::orderBy('carousel_order')->get()
        ]);
    }

    public function officers()
    {
        foreach ($variable as $key => $value) {
            // code...
        }
        return view('administration.officers', [

        ]);
    }
}
