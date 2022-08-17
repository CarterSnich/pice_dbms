<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{

    // store new application
    public function store(Request $request)
    {
        // perform validation checks
        $validator = Validator::make(
            $request->all(),
            [
                // application details
                'membership_status' => ['required', 'in:renewed,new'],
                'chapter' => ['required'],
                'year_chap_no_natl_no' => ['required'],
                'photo' => ['required', 'image'],
                'membership' => ['required', 'in:regular,associate'],
                'prc_registration_no' => ['required',],
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
                'mobile_phone_no' => ['required', 'regex:/(09)[0-9]{9}/'],
                'company_name' => ['required'],
                'email' => ['required', 'email'],
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

        // handle validation result
        if ($validator->fails()) {
            // on failed validation, redirect back to application page
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
            // get all pending applications related to prc registration no
            $pending_count = Application::where([
                ['prc_registration_no', '=', $request['prc_registration_no']],
                ['status', '=', 'pending']
            ])->get();

            // if there is at least one row, redirect back to application page without inputs
            if ($pending_count->count()) {
                return
                    response([
                        'status' => 400,
                        'data' => null,
                        'toast' => [
                            'type' => 'warning',
                            'message' => 'PRC Registration Number has current pending application. Please, contact our administration.'
                        ]
                    ]);
            } else {
                // get the member that has the prc registration number from the application, if any
                $member = Member::where('prc_registration_no', '=', $request->prc_registration_no)->first();

                // if prc reg no exists on a member and the application is new
                if ($member && $request->membership_status == 'new') {
                    return
                        response([
                            'status' => 400,
                            'data' => null,
                            'toast' => [
                                'type' => 'warning',
                                'message' => 'New memberships must not be an existing member.'
                            ]
                        ]);
                }

                // if prc reg no doesnt exist on a and the application is renewed
                if (!$member && $request->membership_status == 'renewed') {
                    return
                        response([
                            'status' => 400,
                            'data' => null,
                            'toast' => [
                                'type' => 'warning',
                                'message' => 'Renewed/Reinstated membership must be an existing member.'
                            ]
                        ]);
                }

                // store photo
                if ($request->file('photo')->store('photos')) {
                    // on success storing photo, store input values for storing hashed file name
                    $formValues = $request->all();
                    $formValues['photo'] = $request->file('photo')->hashName();

                    // create application id
                    $formValues['application_id'] = strtoupper(Str::random(12));

                    // set membership fee
                    $formValues['membership_fee'] = array(
                        'regular' => 700,
                        'associate' => 900
                    )[$request->membership];

                    // store new application
                    if ($application = Application::create($formValues)) {
                        // on success, redirect and generate PDF file of the form
                        return
                            response([
                                'status' => 200,
                                'data' => Application::where('id', '=', $application->id)->first(),
                                'toast' => null
                            ]);
                    } else {
                        // on failed, redirect back without inputs
                        return
                            response([
                                'status' => 500,
                                'data' => null,
                                'toast' => [
                                    'type' => 'warning',
                                    'message' => 'Failed to submit application.'
                                ]
                            ]);
                    }
                } else {
                    // on failed storing photo, redirect back without inputs
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
        }
    }

    // submit form
    public function submit_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'application_id' => ['required', 'exists:applications'],
            'application_form' => ['required', 'mimes:pdf']
        ]);

        if ($validator->fails()) {
            // validation of inputs failed
            return
                response([
                    'status' => 400,
                    'data' => $validator->errors(),
                    'toast' => null
                ]);
        } else {
            // get application
            $application = Application::where('application_id', '=', $request->application_id)->first();

            if ($application->application_form) {
                return
                    response([
                        'status' => 400,
                        'data' => null,
                        'toast' => [
                            'type' => 'warning',
                            'message' => 'You have already submitted an application form for this Application ID. Please, contact our administration.'
                        ]
                    ]);
            } else {

                if ($request->file('application_form')->store('application-forms')) {
                    $application->application_form = $request->file('application_form')->hashName();

                    if ($application->save()) {
                        return
                            response([
                                'status' => 200,
                                'data' => null,
                                'toast' => null
                            ]);
                    } else {
                        return
                            response([
                                'status' => 400,
                                'data' => null,
                                'toast' => [
                                    'type' => 'warning',
                                    'message' => 'Failed to submit application form.'
                                ]
                            ]);
                    }
                } else {
                    return
                        response([
                            'status' => 400,
                            'data' => $request->all(),
                            'toast' => [
                                'type' => 'warning',
                                'message' => 'Failed to upload file.'
                            ]
                        ]);
                }
            }
        }
    }

    // get application
    public function application(Request $request)
    {
        return
            response(
                [
                    'application' => Application::where('id', '=', $request['application_id'])->first()
                ],
                200
            );
    }

    public function get_applications(Request $request)
    {
        if ($request->get('status')) {
            return
                response([
                    'status' => 200,
                    'data' => Application::where('status', '=', $request->get('status'))->get(),
                    'toast' => [
                        'type' => null,
                        'message' => null
                    ]
                ]);
        } else {
            return
                response([
                    'status' => 200,
                    'data' => Application::all(),
                    'toast' => [
                        'type' => null,
                        'message' => null
                    ]
                ]);
        }
    }

    // preview form
    public function form(Application $application)
    {
        $path = asset("storage/application-forms/{$application->application_form}");
        return
            view('pdf_viewer', [
                'filepath' => $path
            ]);
    }

    // approve application
    public function approve(Application $application)
    {
        // date paid of application must not be null
        if ($application->date_paid) {
            $application->status = 'approved';
            $application->date_paid = null;
            if ($application->save()) {
                // update member if membership status is new

                switch ($application->membership_status) {
                    case 'new':
                        $membershipId = $application->prc_registration_no . "_" . substr($application->firstname, 0, 2);
                        $password = Str::random(9);

                        // create new member
                        $member = Member::create([
                            // user account details
                            'membership_id' => $membershipId,
                            'password' => Hash::make($password),

                            // application details
                            'membership_status' => $application->membership_status,
                            'chapter' => $application->chapter,
                            'year_chap_no_natl_no' => $application->year_chap_no_natl_no,
                            'photo' => $application->photo,
                            'membership' => $application->membership,
                            'prc_registration_no' => $application->prc_registration_no,
                            'registration_date' => $application->registration_date,

                            // applicant information
                            'lastname' => $application->lastname,
                            'firstname' => $application->firstname,
                            'middlename' => $application->middlename,
                            'date_of_birth' => $application->date_of_birth,
                            'place_of_birth' => $application->place_of_birth,
                            'gender' => $application->gender,
                            'civil_status' => $application->civil_status,
                            'religion' => $application->religion,
                            'home_address' => $application->home_address,
                            'office_tel_no' => $application->office_tel_no,
                            'mobile_phone_no' => $application->mobile_phone_no,
                            'company_name' => $application->company_name,
                            'email' => $application->email,
                            'company_address' => $application->company_address,
                            'position' => $application->position,
                            'sector' => $application->sector,

                            // educational details
                            'baccalaureate_degree' => $application->baccalaureate_degree,
                            'baccalaureate_college' => $application->baccalaureate_college,
                            'baccalaureate_year' => $application->baccalaureate_year,
                            'post_graduate_degree'  => $application->post_graduate_degree,
                            'post_graduate_college' => $application->post_graduate_college,
                            'post_graduate_year' => $application->post_graduate_year,
                            'fields_of_specialization' => $application->fields_of_specialization,
                        ]);

                        // if member is not empty
                        if ($member) {
                            // send email
                            $email = $application->email;
                            $raw = "Application approved.\nMembership ID: {$membershipId}\nPassword: {$password}";
                            Mail::raw($raw, function ($message) use ($email) {
                                $message
                                    ->to($email)
                                    ->subject("PICE Application approved!");
                            });

                            return
                                response([
                                    'status' => 200,
                                    'data' => null,
                                    'toast' => [
                                        'type' => 'success',
                                        'message' => 'Application approved.'
                                    ]
                                ]);
                        } else {
                            response([
                                'status' => 500,
                                'data' => null,
                                'toast' => [
                                    'type' => 'warning',
                                    'message' => 'Failed to create member.'
                                ]
                            ]);
                        }
                        break;

                    case 'renewed':
                        $isUpdated = Member::where('prc_registration_no', '=', $application->prc_registration_no)
                            ->first()
                            ->update([
                                // application details
                                'membership_status' => $application->membership_status,
                                'chapter' => $application->chapter,
                                'year_chap_no_natl_no' => $application->year_chap_no_natl_no,
                                'photo' => $application->photo,
                                'membership' => $application->membership,
                                'prc_registration_no' => $application->prc_registration_no,
                                'registration_date' => $application->registration_date,

                                // applicant information
                                'lastname' => $application->lastname,
                                'firstname' => $application->firstname,
                                'middlename' => $application->middlename,
                                'date_of_birth' => $application->date_of_birth,
                                'place_of_birth' => $application->place_of_birth,
                                'gender' => $application->gender,
                                'civil_status' => $application->civil_status,
                                'religion' => $application->religion,
                                'home_address' => $application->home_address,
                                'office_tel_no' => $application->office_tel_no,
                                'mobile_phone_no' => $application->mobile_phone_no,
                                'company_name' => $application->company_name,
                                'email' => $application->email,
                                'company_address' => $application->company_address,
                                'position' => $application->position,
                                'sector' => $application->sector,

                                // educational details
                                'baccalaureate_degree' => $application->baccalaureate_degree,
                                'baccalaureate_college' => $application->baccalaureate_college,
                                'baccalaureate_year' => $application->baccalaureate_year,
                                'post_graduate_degree'  => $application->post_graduate_degree,
                                'post_graduate_college' => $application->post_graduate_college,
                                'post_graduate_year' => $application->post_graduate_year,
                                'fields_of_specialization' => $application->fields_of_specialization,
                            ]);

                        if ($isUpdated) {
                            $email = $application->email;
                            $raw = "Application approved. Membership status is now Renewed/Reinstated.";
                            Mail::raw($raw, function ($message) use ($email) {
                                $message
                                    ->to($email)
                                    ->subject("PICE Application approved!");
                            });

                            return
                                response([
                                    'status' => 200,
                                    'data' => null,
                                    'toast' => [
                                        'type' => 'success',
                                        'message' => 'Application approved.'
                                    ]
                                ]);
                        } else {
                            return
                                response([
                                    'status' => 500,
                                    'data' => null,
                                    'toast' => [
                                        'type' => 'warning',
                                        'message' => 'Failed to complete action.'
                                    ]
                                ]);
                        }
                        break;

                    default:
                        return
                            response([
                                'status' => 501,
                                'data' => null,
                                'toast' => [
                                    'type' => 'warning',
                                    'message' => 'Something happened. Please, contact administration.'
                                ]
                            ]);
                        break;
                }
            } else {
                return
                    response([
                        'status' => 500,
                        'data' => null,
                        'toast' => [
                            'type' => 'warning',
                            'message' => 'Something happened.'
                        ]
                    ]);
            }
        } else {
            return
                response([
                    'status' => 400,
                    'data' => null,
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Invalid action.'
                    ]
                ]);
        }
    }

    // reject application
    public function reject(Application $application, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reject_reason' => ['required']
        ], [
            'reject_reason.required' => 'Please, provide a reason.'
        ]);

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
            $application->status = 'not_approved';
            $application->reject_reason = $request['reject_reason'];

            if ($application->save()) {
                $email = $application->email;
                $raw = "Application rejected.\nReason: " . $request['reject_reason'];
                Mail::raw($raw, function ($message) use ($email) {
                    $message
                        ->to($email)
                        ->subject("PICE Application Rejected :(");
                });
                return
                    response([
                        'status' => 200,
                        'data' => null,
                        'toast' => [
                            'type' => 'success',
                            'message' => 'Application rejected.'
                        ]
                    ]);
            } else {
                return
                    response([
                        'status' => 500,
                        'data' => null,
                        'toast' => [
                            'type' => 'warning',
                            'message' => 'Failed to complete action. Something happened.'
                        ]
                    ]);
            }
        }
    }

    // set application as paid
    public function paid(Application $application)
    {
        $success = $application->update([
            'date_paid' => date('Y-m-d')
        ]);

        if ($success) {
            return
                response([
                    'status' => 200,
                    'data' => null,
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Application updated successfully.'
                    ]
                ]);
        } else {
            return
                response([
                    'status' => 500,
                    'data' => null,
                    'toast' => [
                        'type' => 'warning',
                        'message' => 'Failed to complete action.'
                    ]
                ]);
        }
    }
}
