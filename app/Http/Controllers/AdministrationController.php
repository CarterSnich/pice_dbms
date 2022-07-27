<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Application;
use App\Models\Member;
use Illuminate\Http\Request;
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

    public function login() // admin login page
    {
        return view('administration.login');
    }

    public function members(Request $request) // members page
    {
        return view('administration.members', [
            'members' => Member::where('membership', '=', $request['type'])->paginate(50)
        ]);
    }

    public function applications()
    {
        return view('administration.applications', [
            'applications' => Application::all()
        ]);
    }
}
