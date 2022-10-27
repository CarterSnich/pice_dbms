<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Member;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    // signup
    public function signup(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'email', 'unique:members,email'],
                'password' => ['required'],
                'confirm_password' => ['required', 'same:password'],
                'lastname' => ['required'],
                'firstname' => ['required'],
                'middelename'
            ]
        );

        if ($validator->fails()) {
            return
                back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        $formFields = $request->all();
        $hashed = Hash::make($formFields['password']);
        $formFields['password'] = $hashed;

        if (Member::create($formFields)) {
            return
                redirect()
                ->intended('/')
                ->with([
                    'toast' => [
                        'type' => 'success',
                        'message' => 'Member account created. You may now sign-in.'
                    ]
                ]);
        } else {
            return
                redirect()
                ->back('/')
                ->with([
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Failed to create member account.'
                    ]
                ]);
        }
    }

    // authenticate
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Member::where('email', '=', $request->email)->where('role', '!=', 'super_admin')->first()) {
            return
                back()
                ->with([
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Invalid credentials.'
                    ]
                ]);
        }

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

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                // member name
                'lastname' => ['required'],
                'firstname' => ['required'],
                'middlename' => ['nullable'],

                // registration details
                'membership_status' => ['required', Rule::in(Application::MEMBERSHIP_STATUSES)],
                'chapter' => ['required'],
                'year_chap_no_natl_no' => ['required'],
                'photo' => ['nullable', 'image'],
                'membership' => ['required', Rule::in(Application::MEMBERSHIP_TYPES)],
                'prc_registration_no' => ['required'],
                'registration_date' => ['required', 'date'],

                // member information
                'date_of_birth' => ['required', 'date'],
                'place_of_birth' => ['required'],
                'gender' => ['required', 'in:male,female'],
                'civil_status' => ['required', Rule::in(Member::CIVIL_STATUSES)],
                'religion' => ['required', Rule::in(array_keys(Religion::$religions))],
                'home_address' => ['required'],
                'office_tel_no' => ['required'],
                'mobile_phone_no' => ['required', 'regex:/(09)[0-9]{9}/'],
                'company_name' => ['required'],
                'company_address' => ['required'],
                'position' => ['required'],
                'sector' => ['required'],

                // educational details
                'baccalaureate_degree' => ['required'],
                'baccalaureate_college' => ['required'],
                'baccalaureate_year' => ['required'],
                'post_graduate_degree' => ['required'],
                'post_graduate_college' => ['required'],
                'post_graduate_year' => ['required'],
                'fields_of_specialization' => ['required'],

            ]
        );

        if ($validator->fails()) {
            return
                back()
                ->withErrors($validator->errors())
                ->with([
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Please, check your inputs.'
                    ],
                    'profile-update-failed' => true
                ]);
        }


        $formFields = $validator->validated();

        if ($request->has('photo')) {
            if ($request->file('photo')->store('photos')) {
                $formFields['photo'] = $request->file('photo')->hashName();
            } else {
                return
                    redirect('/member/profile')
                    ->with([
                        'toast' => [
                            'type' => 'warning',
                            'message' => 'Failed to upload photo.'
                        ]
                    ]);
            }
        }

        if (Member::where('id', '=', auth('member')->user()->id)->update($formFields)) {
            return
                redirect('/member/profile')
                ->with([
                    'toast' => [
                        'type' => 'success',
                        'message' => 'Profile updated.'
                    ]
                ]);
        } else {
            return
                back()
                ->with([
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Failed to update profile.'
                    ]
                ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | PAGE ROUTES
    |--------------------------------------------------------------------------
    */


    // appliction
    public function application()
    {
        return view('member.application', [
            'member' => Member::where('id', '=', auth('member')->user()->id)->first()
        ]);
    }

    // profile
    public function profile()
    {
        $member = Member::where('id', '=', Auth::guard('member')->user()->id)->first();
        $application =
            Application::orderBy('date')
            ->where('member_id', '=', $member->id);

        return view('member.profile', [
            'member' => $member,
            'application' => $application
        ]);
    }

    public function edit_member(Member $member)
    {
        return
            view('administration.edit_member', [
                'member' => $member
            ]);
    }

    public function update_member(Request $request, Member $member)
    {
        $validator  = Validator::make(
            $request->all(),
            [
                // application details
                'membership_status' => ['required', 'in:renewed,new'],
                'chapter' => ['required'],
                'year_chap_no_natl_no' => ['required'],
                'photo' => ['required', 'image', 'sometimes'],
                'membership' => ['required', 'in:regular,associate'],
                'prc_registration_no' => [
                    'required',
                    Rule::unique('members', 'prc_registration_no')->ignore($member->id)
                ],
                'registration_date' => ['required'],

                // applicant information
                'lastname' => ['required'],
                'firstname' => ['required'],
                'date_of_birth' => ['required', 'date'],
                'place_of_birth' => ['required'],
                'gender' => ['required', 'in:male,female'],
                'civil_status' => ['required', 'in:single,married,divorced,widowed'],
                'home_address' => ['required'],
                'office_tel_no' => ['required'],
                'mobile_phone_no' => [
                    'required', 'regex:/(09)[0-9]{9}/',
                    Rule::unique('members', 'mobile_phone_no')->ignore($member->id)
                ],
                'company_name' => ['required'],
                'email' => [
                    'required', 'email',
                    Rule::unique('members', 'email')->ignore($member->id)
                ],
                'company_address' => ['required'],
                'position' => ['required'],
                'sector' => ['required'],

                // educational details
                'baccalaureate_degree' => ['required'],
                'baccalaureate_college' => ['required'],
                'baccalaureate_year' => ['required', 'digits:4'],
                'post_graduate_degree' => ['required'],
                'post_graduate_college' => ['required'],
                'post_graduate_year' => ['required', 'digits:4'],
                'fields_of_specialization' => ['required'],
            ],
            [
                'date_of_birth.required' => 'Enter a valid date.'
            ]
        );

        if ($validator->fails()) {
            return
                response([
                    'status' => 400,
                    'data' => $validator->errors(),
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Please, check your inputs.'
                    ]
                ]);
        } else {
            $formValues = $request->all();

            // store photo if exists from request
            if ($request->photo) {
                if ($request->file('photo')->store('photos')) {
                    // on success storing photo, store input values for storing hashed file name
                    $formValues['photo'] = $request->file('photo')->hashName();
                } else {
                    return
                        response([
                            'status' => 500,
                            'data' => null,
                            'toast' => [
                                'type' => 'warning',
                                'message' => 'Failed to upload photo.'
                            ]
                        ]);
                }
            }

            // udpdate member to database
            if ($member->update($formValues)) {
                return
                    response([
                        'status' => 200,
                        'data' => null,
                        'toast' => [
                            'type' => 'success',
                            'message' => 'Member updated successfully.'
                        ]
                    ]);
            } else {
                return
                    response([
                        'status' => 500,
                        'data' => null,
                        'toast' => [
                            'type' => 'warning',
                            'message' => 'Failed to update member details.'
                        ]
                    ]);
            }
        }
    }
}
