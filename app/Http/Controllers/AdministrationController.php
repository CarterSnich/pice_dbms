<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Administrator;

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

        if (auth('administrator')->attempt($formFields)) {
            $request->session()->regenerate();
            $administrator = Administrator::where('email', auth('administrator')->user()->email)->first();
            $administrator->createToken('AuthToken');
            return redirect()->intended('/administration/members');
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
        return redirect('/');
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
        return view('administration.members', [
            'members' => Member::where('membership', '=', $request['membership'])->paginate(50)
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
}
