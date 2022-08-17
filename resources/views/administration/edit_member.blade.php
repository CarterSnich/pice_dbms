@extends('layouts.administration_layout')


@section('style')
    <style>
        #content {
            display: flex;
            flex-flow: column;
            height: calc(100vh - 3.25rem);
            padding: 1.25rem;
        }

        #content>form {
            height: 100%;
            flex-grow: 1;
            overflow: auto;
        }

        form .form-inner {
            width: calc(100% - 20.25rem)
        }


        div.photo-preview {
            margin-top: 0.25rem;
            padding: 0.25rem;
            border: 1px solid gray;
            border-radius: .25rem;
            background-color: whitesmoke;
            display: block;
            width: max-content
        }

        div.photo-preview>img {
            margin: 0;
            border: none;
            width: 200px;
            height: 200px;
        }
    </style>
@endsection


@section('content')
    {{-- top nav bar --}}
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Update Member ID <span class="text-info">#{{ $member->membership_id }}</span></span>
        </div>
    </nav>
    <div id="content" class="pb-3">

        <form class="d-flex justify-content-center" id="update-member-form">
            <div class="form-inner d-flex gap-5 flex-column">


                {{-- membership details details --}}
                <div class="d-flex flex-column gap-3">
                    <h2 class="text-primary">Membership Details</h2>

                    <div class="row g-3">
                        {{-- membership status --}}
                        <div class="col-4">
                            <label for="membership_status">Membership status</label>
                        </div>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="membership_status" id="renewed" value="renewed" @if ($member->membership_status == 'renewed') checked @endif>
                                <label class="form-check-label" for="renewed">
                                    Renewed/Reinstated
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="membership_status" id="new" value="new" @if ($member->membership_status == 'new') checked @endif>
                                <label class="form-check-label" for="new">
                                    New
                                </label>
                            </div>
                            <div class="error-message text-danger" data-error-for="membership_status"></div>
                        </div>

                        {{-- chapter --}}
                        <div class="col-4">
                            <label for="chapter">Chapter</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="chapter" name="chapter" value="{{ $member->chapter }}">
                            <div class="error-message text-danger" data-error-for="chapter"></div>
                        </div>

                        {{-- Year/Chap No/Natl No --}}
                        <div class="col-4">
                            <label for="year_chap_no_natl_no">Year/Chap No/Natl No</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="year_chap_no_natl_no" id="year_chap_no_natl_no" value="{{ $member->year_chap_no_natl_no }}">
                            <div class="error-message text-danger" data-error-for="year_chap_no_natl_no"></div>
                        </div>

                        {{-- photo --}}
                        <div class="col-4">
                            <label for="photo">Photo</label>
                        </div>
                        <div class="col-8">
                            <input type="file" class="form-control" name="photo" id="photo" value="{{ $member->photo }}">
                            <div class="photo-preview mb-1">
                                <img src="{{ asset("/storage/photos/{$member->photo}") }}">
                            </div>
                            <div class="error-message text-danger" data-error-for="photo"></div>
                        </div>

                        {{-- membership --}}
                        <div class="col-4">
                            <label for="membership">Membership</label>
                        </div>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="membership" id="regular" value="regular" @if ($member->membership == 'regular') checked @endif>
                                <label class="form-check-label" for="regular">
                                    Regular
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="membership" id="associate" value="associate" @if ($member->membership == 'associate') checked @endif>
                                <label class="form-check-label" for="associate">
                                    Associate
                                </label>
                            </div>
                            <div class="error-message text-danger" data-error-for="membership"></div>
                        </div>

                        {{-- prc registration no --}}
                        <div class="col-4">
                            <label for="prc_registration_no">PRC Registration #</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="prc_registration_no" id="prc_registration_no" value="{{ $member->prc_registration_no }}">
                            <div class="error-message text-danger" data-error-for="prc_registration_no"></div>
                        </div>

                        {{-- registration date --}}
                        <div class="col-4">
                            <label for="registration_date">Registration Date</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="registration_date" id="registration_date" value="{{ $member->registration_date }}">
                            <div class="error-message text-danger" data-error-for="registration_date"></div>
                        </div>

                    </div>
                </div>

                {{-- personal information --}}
                <div class="d-flex flex-column gap-3">
                    <h2 class="text-primary">Personal information</h2>

                    <div class="row g-3">
                        {{-- lastname --}}
                        <div class="col-4">
                            <label for="lastname">Last name</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $member->lastname }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- firstname --}}
                        <div class="col-4">
                            First name
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="firstname" name="firstname" value="{{ $member->firstname }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- Middlename --}}
                        <div class="col-4">
                            <label for="middlename">Middle name</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="middlename" id="middlename" value="{{ $member->middlename }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- date of birth --}}
                        <div class="col-4">
                            <label for="date_of_birth">Date of birth</label>
                        </div>
                        <div class="col-8">
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $member->date_of_birth }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- place of birth --}}
                        <div class="col-4">
                            <label for="place_of_birth">Place of birth</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="{{ $member->place_of_birth }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- gender --}}
                        <div class="col-4">
                            <label for="gender">Gender</label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" name="gender" id="gender">
                                <option value="" selected disabled>Select gender</option>
                                <option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- civil status --}}
                        <div class="col-4">
                            <label for="civil_status">Civil status</label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" name="civil_status" id="civil_status">
                                <option value="" selected disabled>Select status</option>
                                <option value="single" {{ $member->civil_status == 'single' ? 'selected' : '' }}>Single</option>
                                <option value="married" {{ $member->civil_status == 'married' ? 'selected' : '' }}>Married</option>
                                <option value="divorced" {{ $member->civil_status == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="widowed" {{ $member->civil_status == 'widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- religion --}}
                        <div class="col-4">
                            <label for="religion">Religion</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="religion" id="religion" value="{{ $member->religion }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- home address --}}
                        <div class="col-4">
                            <label for="home_address">Home address</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="home_address" id="home_address" value="{{ $member->home_address }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- office tel no --}}
                        <div class="col-4">
                            <label for="office_tel_no">Office Tel. No.</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="office_tel_no" id="office_tel_no" value="{{ $member->office_tel_no }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- office tel no --}}
                        <div class="col-4">
                            <label for="mobile_phone_no">Mobile Phone No.</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="mobile_phone_no" id="mobile_phone_no" value="{{ $member->mobile_phone_no }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- company name --}}
                        <div class="col-4">
                            <label for="company_name">Company name</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $member->company_name }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- email --}}
                        <div class="col-4">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-8">
                            <input type="email" class="form-control" name="email" id="email" value="{{ $member->email }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- company_address --}}
                        <div class="col-4">
                            <label for="company_address">Company address</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="company_address" id="company_address" value="{{ $member->company_address }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- position --}}
                        <div class="col-4">
                            <label for="position">Position</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="position" id="position" value="{{ $member->position }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- position --}}
                        <div class="col-4">
                            <label for="position">Position</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="position" id="position" value="{{ $member->position }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- sector --}}
                        <div class="col-4">
                            <label for="sector">Sector</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="sector" id="sector" value="{{ $member->sector }}">
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>
                </div>

                {{-- educational details --}}
                <div class="d-flex flex-column gap-3">
                    <h2 class="text-primary">Educational Details</h2>

                    <div class="row g-3">

                        {{-- baccalaureate_degree --}}
                        <div class="col-4">
                            <label for="baccalaureate_degree">Baccalaureate degree</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="baccalaureate_degree" id="baccalaureate_degree" value="{{ $member->baccalaureate_degree }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- baccalaureate_college --}}
                        <div class="col-4">
                            <label for="baccalaureate_college">Baccalaureate College/University</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="baccalaureate_college" id="baccalaureate_college" value="{{ $member->baccalaureate_college }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- baccalaureate_year --}}
                        <div class="col-4">
                            <label for="baccalaureate_year">Baccalaureate Year Graduated</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="baccalaureate_year" id="baccalaureate_year" value="{{ $member->baccalaureate_year }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- post_graduate_degree --}}
                        <div class="col-4">
                            <label for="post_graduate_degree">Post Graduate Degree</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="post_graduate_degree" id="post_graduate_degree" value="{{ $member->post_graduate_degree }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- post_graduate_college --}}
                        <div class="col-4">
                            <label for="post_graduate_college">Post Graduate College/University</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="post_graduate_college" id="post_graduate_college" value="{{ $member->post_graduate_college }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- post_graduate_year --}}
                        <div class="col-4">
                            <label for="post_graduate_year">Post Graduate Year</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="post_graduate_year" id="post_graduate_year" value="{{ $member->post_graduate_year }}">
                            <div class="error-message text-danger"></div>
                        </div>

                        {{-- fields_of_specialization --}}
                        <div class="col-4">
                            <label for="fields_of_specialization">Fields of Specialization</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="fields_of_specialization" id="fields_of_specialization" value="{{ $member->fields_of_specialization }}">
                            <div class="error-message text-danger"></div>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" form="update-member-form" class="btn btn-primary btn-block mb-5">Update</button>
                </div>
            </div>


        </form>

    </div>
@endsection


@section('script')
    <script src="{{ asset('js/moment.js') }}"></script>

    <script>
        // enable tooltips
        let tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-has-tooltip="true"]')
        );
        let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        let toast = new bootstrap.Toast(document.querySelector('#toast-wrapper>.toast'))

        $('input[type=file]').on('change input', function() {
            $('div.photo-preview>img').attr('src', URL.createObjectURL(this.files[0]))
        })

        $('form#update-member-form').on('submit', function(event) {
            event.preventDefault();
            $('button[type=submit]').attr('disabled', true)

            let inputs = $(this).serializeArray()
            let body = new FormData()

            inputs.forEach(input => {
                body.append(input.name, input.value)
            });
            let photo = $('input[type=file][name=photo]')[0].files[0];
            if (photo !== undefined) body.append('photo', photo, photo['name']);

            fetch(window.location.pathname, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    body: body,
                })
                .then((res) => res.json())
                .then((res) => {
                    if (res.status == 200) {
                        setTimeout(() => {
                            window.location.href = `/administration/members?membership=${$('input[name=membership]').val()}`
                        }, 3000);
                    } else {
                        $('button[type=submit]').attr('disabled', false)
                    }

                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Member update')
                    $('#toast-wrapper>.toast').find('.toast-body').text(res.toast.message)
                    toast.show()

                })
                .catch((err) => {
                    console.error(err)
                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Member update')
                    $('#toast-wrapper>.toast').find('.toast-body').text('Something happened.')
                    toast.show()

                    $('button[type=submit]').attr('disabled', false)
                });



        })
    </script>
@endsection
