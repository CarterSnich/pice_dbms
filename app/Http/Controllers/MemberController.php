<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    // authenticate
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'membership_id' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::guard('member')->attempt($credentials)) {
            $request->session()->regenerate();
            return
                redirect('/')
                ->with([
                    'toast' => [
                        'type' => 'success',
                        'message' => 'User signed-in.'
                    ]
                ]);
        }

        return
            back()
            ->with([
                'toast' => [
                    'type' => 'warning',
                    'message' => 'Invalid credentials.'
                ]
            ]);
    }

    // logout member
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // get member
    public function get_member(Request $request)
    {
        $member = Member::where('id', '=', $request->member_id)->first();
        if ($member) {
            return
                response([
                    'status' => 200,
                    'data' => $member,
                    'toast' => [
                        'type' => null,
                        'message' => null
                    ]
                ]);
        } else {
            return
                response([
                    'status' => 400,
                    'data' => null,
                    'toast' => [
                        'type' => 'success',
                        'message' => 'Member not found.'
                    ]
                ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | PAGE ROUTES
    |--------------------------------------------------------------------------
    */

    // dashboard
    public function dashboard()
    {
        return
            view('member.dashboard');
    }
}
