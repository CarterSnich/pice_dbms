<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    // store
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => ['required'],
                'description' => ['required'],
                'picture' => ['required', 'image'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date', 'after_or_equal:start_date'],
                'cost'  => ['nullable', 'digits_between:0,9999'],
                'organizer'  => ['required'],
                'contact_no' => ['required', 'regex:/(09)[0-9]{9}/'],
                'email' => ['required', 'email'],
                'website' => ['required', 'url'],
                'venue' => ['required']
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

            if ($request->file('picture')->store('event-pictures')) {
                $formValues = $request->all();
                $formValues['picture'] = $request->file('picture')->hashName();

                if (Event::create($formValues)) {
                    return
                        response([
                            'status' => 200,
                            'data' => null,
                            'toast' => [
                                'type' => 'success',
                                'message' => 'Event posted.'
                            ]
                        ]);
                } else {
                    return
                        response([
                            'status' => 500,
                            'data' => null,
                            'toast' => [
                                'type' => 'danger',
                                'message' => 'Failed to post event.'
                            ]
                        ]);
                }
            } else {
                return
                    response([
                        'status' => 500,
                        'data' => null,
                        'toast' => [
                            'type' => 'danger',
                            'message' => 'Failed to upload picture.'
                        ]
                    ]);
            }
        }
    }
}
