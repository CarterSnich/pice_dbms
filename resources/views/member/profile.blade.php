@extends('layouts.public_layout')

@section('title', 'Profile')

@section('style')
    <style>
        main {
            padding: 2.25rem 5.25rem;
        }

        .profile-wrapper {
            padding: 3.25rem 5.25rem;
        }


        .radio-wrapper {
            display: flex;

            gap: .5rem
        }

        .radio-wrapper>input[type=radio] {
            aspect-ratio: 1/1;
            margin: auto 0;
        }

        .radio-wrapper>label {
            margin: 0
        }

        .photo-preview {
            padding: 0.25rem;
            border: 1px solid gray;
            border-radius: 0.25rem;
            background-color: whitesmoke;
            display: block;
            width: max-content;
        }
    </style>
@section('content')


    <div class="profile-wrapper">

        <div class="d-flex flex-row justify-content-between">
            <h2 class="mt-0">Member profile</h2>
            <div>
                <button class="button-apply">Apply now</button>
                <button class="button-edit">Edit</button>
                <button type="submit" form="edit-profile-form" class="button-save d-none">Save</button>
                <button class="button-cancel d-none">Cancel</button>
            </div>

        </div>

        <div class="profile-display @if (session()->get('profile-update-failed')) d-none @endif">

            {{-- member name --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Member name</div>
                <div class="col-8">

                    {{-- lastname --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Last name</label>
                            <p class="ms-5 h2">{{ $member->lastname }}</p>
                        </div>
                    </div>

                    {{-- firstname --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">First name</label>
                            <p class="ms-5 h2">{{ $member->firstname }}</p>
                        </div>
                    </div>

                    {{-- middlename --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Middle name</label>
                            <p class="ms-5 h2">{{ $member->middlename ?? '&nbsp;' }}</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- registration details --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Registration Details</div>
                <div class="col-8">

                    {{-- membership_status --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Membership status</label>
                            <p class="ms-5 h2">
                                @if ($member->membership_status)
                                    {{ Str::ucfirst($member->membership_status) }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- chapter --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Chapter</label>
                            <p class="ms-5 h2">
                                @if ($member->chapter)
                                    {{ $member->chapter }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- year_chap_no_natl_no --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Year/Chapter No./Nat'l No.</label>
                            <p class="ms-5 h2">
                                @if ($member->year_chap_no_natl_no)
                                    {{ $member->year_chap_no_natl_no }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- photo --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Photo</label>
                            <div class="ms-5 photo-preview mb-1">
                                @if (auth('member')->user()->photo)
                                    <img src="{{ asset('/storage/photos/' . $member->photo) }}" alt="{{ $member->photo }}" width="200px" height="200px">
                                @else
                                    <img src="{{ asset('/images/profile-logo.png') }}" alt="" width="200px" height="200px">
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- membership --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Membership</label>
                            <p class="ms-5 h2">
                                @if ($member->membership)
                                    {{ Str::ucfirst($member->membership) }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- membership --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">PRC Registration No.</label>
                            <p class="ms-5 h2">
                                @if ($member->prc_registration_no)
                                    {{ $member->prc_registration_no }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- registration_date --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Registration date</label>
                            <p class="ms-5 h2">
                                @if ($member->registration_date)
                                    {{ date('F j, Y', strtotime($member->registration_date)) }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- member name --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Member information</div>

                <div class="col-8">

                    {{-- date_of_birth --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Date of birth</label>
                            <p class="ms-5 h2">
                                @if ($member->date_of_birth)
                                    {{ date('F j, Y', strtotime($member->date_of_birth)) }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- place_of_birth --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Place of birth</label>
                            <p class="ms-5 h2">
                                @if ($member->place_of_birth)
                                    {{ $member->place_of_birth }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- gender --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Gender</label>
                            <p class="ms-5 h2">
                                @if ($member->gender)
                                    {{ Str::ucfirst($member->gender) }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>


                    {{-- civil status --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Civil status</label>
                            <p class="ms-5 h2">
                                @if ($member->civil_status)
                                    {{ Str::ucfirst($member->civil_status) }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- religion --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Religion</label>
                            <p class="ms-5 h2">
                                @if ($member->religion)
                                    {{ App\Models\Religion::$religions[$member->religion] }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- home_address --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Home address</label>
                            <p class="ms-5 h2">
                                @if ($member->home_address)
                                    {{ $member->home_address }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- office_tel_no --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Office tel. no.</label>
                            <p class="ms-5 h2">
                                @if ($member->office_tel_no)
                                    {{ $member->office_tel_no }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- mobile_phone_no --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Mobile phone no.</label>
                            <p class="ms-5 h2">
                                @if ($member->mobile_phone_no)
                                    {{ $member->mobile_phone_no }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- company_name --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Company name</label>
                            <p class="ms-5 h2">
                                @if ($member->company_name)
                                    {{ $member->company_name }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- company_address --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Company address</label>
                            <p class="ms-5 h2">
                                @if ($member->company_address)
                                    {{ $member->company_address }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- position --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Position</label>
                            <p class="ms-5 h2">
                                @if ($member->position)
                                    {{ $member->position }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- sector --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Sector</label>
                            <p class="ms-5 h2">
                                @if ($member->sector)
                                    {{ $member->sector }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            {{-- educational details --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Educational details</div>

                <div class="col-8">

                    {{-- baccalaureate_degree --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Baccalaureate Degree
                            </label>
                            <p class="ms-5 h2">
                                @if ($member->baccalaureate_degree)
                                    {{ $member->baccalaureate_degree }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Baccalaureate College/University --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Baccalaureate College/University</label>
                            <p class="ms-5 h2">
                                @if ($member->baccalaureate_college)
                                    {{ $member->baccalaureate_college }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Baccalaureate Year Graduated --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Baccalaureate Year Graduated</label>
                            <p class="ms-5 h2">
                                @if ($member->baccalaureate_year)
                                    {{ $member->baccalaureate_year }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Post Graduate Degree --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Post Graduate Degree</label>
                            <p class="ms-5 h2">
                                @if ($member->post_graduate_degree)
                                    {{ $member->post_graduate_degree }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Post Graduate College/University --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Post Graduate College/University</label>
                            <p class="ms-5 h2">
                                @if ($member->post_graduate_college)
                                    {{ $member->post_graduate_college }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Post Graduate Year --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Post Graduate Year</label>
                            <p class="ms-5 h2">
                                @if ($member->post_graduate_year)
                                    {{ $member->post_graduate_year }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Fields of Specialization --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Fields of Specialization</label>
                            <p class="ms-5 h2">
                                @if ($member->fields_of_specialization)
                                    {{ $member->fields_of_specialization }}
                                @else
                                    &nbsp;
                                @endif
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <form id="edit-profile-form" method="POST" enctype="multipart/form-data" class="profile-edit @unless(session()->get('profile-update-failed')) d-none @endunless">
            @csrf
            @method('PUT')

            {{-- member name --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Member name</div>
                <div class="col-8">

                    {{-- lastname --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="lastname">Last name</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="lastname" name="lastname" value="{{ $member->lastname }}" required>
                                @error('lastname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- firstname --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="firstname">First name</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="firstname" name="firstname" value="{{ $member->firstname }}" required>
                                @error('firstname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- middlename --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="middlename">Middle name</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="middlename" name="middlename" value="{{ $member->middlename }}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- registration details --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Registration Details</div>
                <div class="col-8">

                    {{-- membership_status --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="membership_status">Membership status</label>
                            <div class="ms-5">
                                <div class="radio-wrapper">
                                    <input type="radio" name="membership_status" id="new_membership_renewal" value="renewed" @if ($member->membership_status == 'renewed') checked @endif required>
                                    <label class="fs-5" for="new_membership_renewal">Renewed/Reinstated</label>
                                </div>
                                <div class="radio-wrapper">
                                    <input type="radio" name="membership_status" id="new_membership_new" value="new" @if ($member->membership_status == 'new') checked @endif>
                                    <label class="fs-5" for="new_membership_new">New</label>
                                </div>
                                @error('membership_status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- chapter --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="chapter">Chapter</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="chapter" name="chapter" value="{{ $member->chapter ?? 'Tacloban' }}" required>
                                @error('chapter')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- year_chap_no_natl_no --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="year_chap_no_natl_no">Year/Chapter No./Nat'l No.</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="year_chap_no_natl_no" name="year_chap_no_natl_no" value="{{ $member->year_chap_no_natl_no ?? '2007' }}" required>
                                @error('year_chap_no_natl_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- photo --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="photo">Photo</label>
                            <div class="ms-5 section-input">
                                <div class="photo-preview mb-1">
                                    <img width="200" height="200" src="{{ asset('/storage/photos/' . $member->photo) }}">
                                </div>
                                <input type="file" class="w-100" name="photo" accept="image/png, image/jpeg">
                                @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- membership --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="membership">Membership</label>
                            <div class="ms-5">
                                <div class="section-input">
                                    @foreach (App\Models\Application::MEMBERSHIP_TYPES as $type)
                                        <div class="radio-wrapper">
                                            <input type="radio" name="membership" id="membership_{{ $type }}" value="{{ $type }}" @if ($member->membership == $type) checked @endif @if ($loop->first) required @endif>
                                            <label class="fs-5" for="membership_{{ $type }}">{{ Str::ucfirst($type) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('membership')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- prc_registration_no --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="prc_registration_no">PRC Registration No.</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="prc_registration_no" name="prc_registration_no" value="{{ $member->prc_registration_no }}" required>
                                @error('prc_registration_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- registration_date --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="registration_date">Registration date</label>
                            <div class="ms-5">
                                <input type="date" class="w-100" id="registration_date" name="registration_date" value="{{ $member->registration_date }}" required>
                                @error('registration_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- member information --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Member information</div>

                <div class="col-8">

                    {{-- date_of_birth --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="date_of_birth">Date of birth</label>
                            <div class="ms-5">
                                <input type="date" class="w-100" name="date_of_birth" id="date_of_birth" value="{{ $member->date_of_birth }}" required>
                                @error('date_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- place_of_birth --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="place_of_birth">Place of birth</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="place_of_birth" name="place_of_birth" value="{{ $member->place_of_birth }}" required>
                                @error('place_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- gender --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="gender">Gender</label>
                            <div class="ms-5">
                                <select id="gender" name="gender" required>
                                    <option selected="" disabled="" value="">Select gender</option>
                                    <option value="male" @if ($member->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if ($member->gender == 'female') selected @endif>Female</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    {{-- civil status --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="civil_status">Civil status</label>
                            <div class="ms-5">
                                <select name="civil_status" id="civl_status" required>
                                    <option value="" disabled selected>Select status</option>
                                    @foreach (App\Models\Member::CIVIL_STATUSES as $status)
                                        <option value="{{ $status }}" @if ($status == $member->civil_status) selected @endif>
                                            {{ Str::ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('civil_status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- religion --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="religion">Religion</label>
                            <div class="ms-5">
                                <select name="religion" id="religion" required>
                                    <option value="" disabled selected>Select religion</option>
                                    @foreach (App\Models\Religion::$religions as $key => $religion)
                                        <option value="{{ $key }}" @if ($key == $member->religion) selected @endif>
                                            {{ $religion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('religion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- home_address --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="home_address">Home address</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="home_address" id="home_address" value="{{ $member->home_address }}" required>
                                @error('home_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- office_tel_no --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="office_tel_no">Office tel. no.</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="office_tel_no" id="office_tel_no" value="{{ $member->office_tel_no }}" required>
                                @error('office_tel_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- mobile_phone_no --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Mobile phone no.</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="mobile_phone_no" id="mobile_phone_no" value="{{ $member->mobile_phone_no }}" pattern="(09)[0-9]{9}" required>
                                @error('mobile_phone_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- company_name --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="company_name">Company name</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="company_name" id="company_name" value="{{ $member->company_name }}" required>
                                @error('company_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- company_address --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary">Company address</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="company_address" id="company_address" value="{{ $member->company_address }}" required>
                                @error('company_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- position --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="position">Position</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="position" id="position" value="{{ $member->position }}" required>
                                @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- sector --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="sector">Sector</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="sector" id="sector" value="{{ $member->sector }}" required>
                                @error('sector')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            {{-- educational details --}}
            <hr>
            <div class="row">
                <div class="col-4 h4 ps-4">Educational details</div>

                <div class="col-8">

                    {{-- baccalaureate_degree --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="baccalaureate_degree">Baccalaureate Degree</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="baccalaureate_degree" id="baccalaureate_degree" value="{{ $member->baccalaureate_degree }}" required>
                                @error('baccalaureate_degree')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Baccalaureate College/University --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="baccalaureate_college">Baccalaureate College/University</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="baccalaureate_college" name="baccalaureate_college" value="{{ $member->baccalaureate_college }}" required>
                                @error('baccalaureate_college')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Baccalaureate Year Graduated --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="baccalaureate_year">Baccalaureate Year Graduated</label>
                            <div class="ms-5">
                                <select name="baccalaureate_year" required>
                                    <option selected disabled value="">Select year</option>
                                    @for ($i = 0; $i < 50; $i++)
                                        @php $year = intval(date('Y')) - $i; @endphp
                                        <option value="{{ $year }}" @if ($member->baccalaureate_year == $year) selected @endif>{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('baccalaureate_year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Post Graduate Degree --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="post_graduate_degree">Post Graduate Degree</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="post_graduate_degree" name="post_graduate_degree" value=" {{ $member->post_graduate_degree }}" required>
                                @error('post_graduate_degree')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Post Graduate College/University --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="post_graduate_college">Post Graduate College/University</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" name="post_graduate_college" id="post_graduate_college" value="{{ $member->post_graduate_college }}" required>
                                @error('post_graduate_college')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Post Graduate Year --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="post_graduate_year">Post Graduate Year</label>
                            <div class="ms-5">
                                <select name="post_graduate_year" required>
                                    <option selected disabled value="">Select year</option>
                                    @for ($i = 0; $i < 50; $i++)
                                        @php $year = intval(date('Y')) - $i; @endphp
                                        <option value="{{ $year }}" @if ($member->post_graduate_year == $year) selected @endif>{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('post_graduate_year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Fields of Specialization --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <label class="h4 text-primary" for="fields_of_specialization">Fields of Specialization</label>
                            <div class="ms-5">
                                <input type="text" class="w-100" id="fields_of_specialization" name="fields_of_specialization" value="{{ $member->fields_of_specialization }}" required>
                                @error('fields_of_specialization')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>


@endsection


@section('script')
    {{-- jsdpdf --}}
    <script src="{{ asset('js/jspdf.umd.min.js') }}"></script>

    <script>
        $('.button-edit').on('click', function() {
            $('.profile-display').addClass('d-none');
            $('.profile-edit').removeClass('d-none');
            $('.button-apply').addClass('d-none')
            $('.button-save').removeClass('d-none')
            $('.button-cancel').removeClass('d-none')
            $(this).addClass('d-none');
        })

        $('.button-cancel').on('click', function() {
            $('.profile-display').removeClass('d-none');
            $('.profile-edit').addClass('d-none');
            $(this).addClass('d-none');
            $('.button-apply').removeClass('d-none')
            $('.button-save').addClass('d-none')
            $('.button-edit').removeClass('d-none')
            document.querySelector('#edit-profile-form').reset()
        })

        $('form#edit-profile-form input[type=file]').on('change input', function() {
            $('.photo-preview>img').attr('src', URL.createObjectURL(this.files[0]))
        })


        $('.button-apply').on('click', function() {
            fetch('/member/profile/apply', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                })
                .then(res => res.text())
                .then(data => {
                    try {
                        const resp = JSON.parse(data)
                        if (resp.status == 200) {
                            generatePdf(resp.data)
                        } else {
                            alert(resp.toast.message);
                        }
                    } catch (error) {
                        console.error(error)
                        alert(error)
                    }
                })
                .catch(err => {
                    console.error(err)
                    alert(err);
                })
        })

        function generatePdf(applicationData) {
            // pdf file name
            let fileName = `pice-application-${applicationData['lastname']}.pdf`;

            // initialize jsdpdf
            let doc = new jspdf.jsPDF({
                orientation: "portrait",
                unit: "in",
                format: [8.27, 11.69]
            });

            const alignCenter = {
                align: 'center'
            }

            doc.setFontSize(11);

            doc.addImage("{{ asset('images/application-form.png') }}", 0, 0, 8.27, 11.69)

            // ------------------------------
            //  APPLICATION
            // ------------------------------

            // date
            doc.text(applicationData['date'], 2.8, 2.275, alignCenter)

            // membership status
            if (applicationData['membership_status'] == 'renewal')
                doc.text('X', 1.965, 2.6) // renewal
            else
                doc.text('X', 3.71, 2.6) // new

            // chapter
            doc.text(applicationData['chapter'], 2.8, 2.89, alignCenter)

            // year/chap no/natl no
            doc.text(applicationData['year_chap_no_natl_no'], 2.8, 3.2225, alignCenter)

            // photo
            doc.addImage(`/storage/photos/${applicationData['photo']}`, 6.21, 1.495, 1, 1)

            // // membership
            // if (applicationData['membership'] == 'regular')
            //     doc.text('X', 5.21, 2.91) // regular
            // else
            //     doc.text('X', 6.505, 2.91) // associate
            doc.text(applicationData['membership'], 5.21, 2.91)

            // prc registration no
            doc.text(applicationData['prc_registration_no'], 6.83, 3.2225, alignCenter)

            // registration date
            doc.text(applicationData['registration_date'], 6.83, 3.555, alignCenter)

            // ------------------------------
            //  PERSONAL INFORMATION
            // ------------------------------

            // lastname
            doc.text(applicationData['lastname'], 2.5, 4.065, alignCenter)

            // firstname
            doc.text(applicationData['firstname'], 6.65, 4.065, alignCenter)

            // middlename
            doc.text(applicationData['middlename'] || '', 2.5, 4.4, alignCenter)

            // date of birth
            doc.text(applicationData['date_of_birth'], 5.65, 4.4, alignCenter)

            // place of birth
            doc.text(applicationData['place_of_birth'], 7.05, 4.4)

            // gender
            doc.text(applicationData['gender'], 1.6, 4.725, alignCenter)

            // civil status
            doc.text(applicationData['civil_status'], 3.35, 4.725, alignCenter)

            // religion
            doc.text(applicationData['religion'] || '', 6.65, 4.725, alignCenter)

            // home address // if greater than 18 characters, add the new line
            if (applicationData['home_address'].length > 18) {
                doc.text(applicationData['home_address'].substring(0, 18), 2.68, 5.07, alignCenter)
                doc.text(applicationData['home_address'].substring(18), 2.05, 5.4, alignCenter)
            } else {
                doc.text(applicationData['home_address'], 2.68, 5.07, alignCenter)
            }

            // office tel no
            doc.text(applicationData['office_tel_no'], 6.65, 5.07, alignCenter)

            // mobile phone no
            doc.text(applicationData['mobile_phone_no'], 6.65, 5.4, alignCenter)

            // company name
            doc.text(applicationData['company_name'], 2.68, 5.725, alignCenter)

            // email
            doc.text(applicationData['email'], 6.65, 5.725, alignCenter)

            // company address // if greater than 18 characters, add the new line
            if (applicationData['company_address'].length > 18) {
                doc.text(applicationData['company_address'].substring(0, 18), 2.68, 6.0575, alignCenter)
                doc.text(applicationData['company_address'].substring(18), 2.05, 6.4, alignCenter)
            } else {
                doc.text(applicationData['company_address'], 2.68, 6.0575, alignCenter)
            }

            // position
            doc.text(applicationData['position'], 6.65, 6.0575, alignCenter)

            // sector
            doc.text(applicationData['sector'], 6.65, 6.4, alignCenter)


            // ------------------------------
            //  EDUCATIONAL DETAILS
            // ------------------------------

            // baccalaureate degree
            doc.text(applicationData['baccalaureate_degree'], 2.8, 6.91, alignCenter)

            // baccalaureate college
            doc.text(applicationData['baccalaureate_college'], 2.8, 7.225, alignCenter)

            // baccalaureate graduate year
            doc.text(applicationData['baccalaureate_year'].toString(), 2.8, 7.525, alignCenter)

            // post graduate degree
            doc.text(applicationData['post_graduate_degree'], 6.83, 6.91, alignCenter)

            // post graduate college
            doc.text(applicationData['post_graduate_college'], 6.83, 7.225, alignCenter)

            // post graduate year
            doc.text(applicationData['post_graduate_year'].toString(), 6.83, 7.525, alignCenter)

            // fields of specialization
            doc.text(applicationData['fields_of_specialization'], 8.27 / 2, 8.225, alignCenter)

            // application id
            doc.text(`Application #: ${applicationData['application_id']}`, 8.27 - 0.5, 11.69 - 0.5, {
                align: 'right'
            })

            doc.save(`pice-application-${applicationData['application_id']}`)

            // $('dialog#application-form-dialog>div>button').on('click', function() {
            // })

        }
    </script>
@endsection

@error('lastname')
    <div class="text-danger">{{ $message }}</div>
@enderror
