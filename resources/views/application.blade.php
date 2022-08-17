@extends('layouts.public_layout')

@section('title', 'Membership Application | Philippine Institute of Civil Enginerring')

@section('style')
    <style>
        #form-wrapper {
            padding-inline: 5.25rem;
            padding-block: 3.25rem;
            display: flex;
            flex-flow: column;
            justify-content: center;
        }

        #form-wrapper>form {
            margin-inline: auto;
            width: 556px;
        }

        #form-wrapper>form h2 {
            width: fit-content
        }

        /* section */
        .section>.section-title {
            margin: 0;
            margin-bottom: .25rem
        }

        .section>.section-input {
            margin-inline-start: 2rem
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

        div.photo-preview {
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

        #application-form-dialog {
            width: 600px;
        }

        #application-form-dialog>div {
            display: flex;
            flex-flow: column;
            padding: 1.25rem;
        }

        #application-form-dialog>div>button {
            margin-inline: auto;
        }
    </style>
@endsection


@section('content')
    {{-- some random banner or whatnot --}}
    <div class="page-banner">
        <img src="{{ asset('images/MEMBERSHIP-1-1536x240.png') }}" alt="">
    </div>

    {{-- membership application form --}}
    <div id="form-wrapper">
        <h2 class="text-center mb-5">Membership Application / Update Form</h2>
        <form method="POST" id="application-form" class="needs-validation d-grid gap-5" action="/application/submit" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- application --}}
            <div>
                <h2 class="m-0">Application</h2>
                <hr class="mt-2">

                <div class="px-2 d-grid gap-2">
                    {{-- membership status --}}
                    <div class="section">
                        <label class="section-title fs-4">Membership status</label>
                        <div class="section-input">
                            <div class="radio-wrapper">
                                <input type="radio" name="membership_status" id="new_membership_renewal" value="renewed" required {{ old('membership_status') == 'renewal' ? 'checked' : '' }}>
                                <label class="fs-5" for="new_membership_renewal">Renewed/Reinstated</label>
                            </div>
                            <div class="radio-wrapper">
                                <input type="radio" name="membership_status" id="new_membership_new" value="new" {{ old('membership_status') == 'new' ? 'checked' : '' }}>
                                <label class="fs-5" for="new_membership_new">New</label>
                            </div>
                            {{-- error messages --}}
                            <div class="error-message text-danger" data-error-for="membership_status"></div>
                        </div>
                    </div>


                    {{-- chapter --}}
                    <div class="section">
                        <label class="section-title fs-4">Chapter</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="chapter" value="{{ old('chapter') }}" required>
                            <div class="error-message text-danger" data-error-for="chapter"></div>
                        </div>
                    </div>


                    {{-- year/chap no/natl no --}}
                    <div class="section">
                        <label class="section-title fs-4">Year/Chap No/Natl No</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="year_chap_no_natl_no" value="{{ old('year_chap_no_natl_no') }}" required>
                            <div class="error-message text-danger" data-error-for="year_chap_no_natl_no"></div>
                        </div>
                    </div>

                    {{-- photo --}}
                    <div class="section">
                        <label class="section-title fs-4">Photo (ID 1x1)</label>
                        <div class="section-input">
                            <div class="photo-preview mb-1">
                                <img>
                            </div>
                            <input type="file" class="w-100" name="photo" required>
                            <div class="error-message text-danger" data-error-for="photo"></div>
                        </div>
                    </div>

                    {{-- membership --}}
                    <div class="section">
                        <label class="section-title fs-4">Membership</label>
                        <div class="section-input">
                            <div class="radio-wrapper">
                                <input type="radio" name="membership" id="membership_regular" value="regular" {{ old('membership') == 'regular' ? 'checked' : '' }} required>
                                <label class="fs-5" for="membership_regular">Regular</label>
                            </div>
                            <div class="radio-wrapper">
                                <input type="radio" name="membership" id="membership_associate" value="associate" {{ old('membership') == 'associate' ? 'checked' : '' }}>
                                <label class="fs-5" for="membership_associate">Associate</label>
                            </div>
                            <div class="error-message text-danger" data-error-for="membership"></div>
                        </div>
                    </div>

                    {{-- prce registration no --}}
                    <div class="section">
                        <label class="section-title fs-4">PRC Registration #</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="prc_registration_no" value="{{ old('prc_registration_no') }}" required>
                            <div class="error-message text-danger" data-error-for="prc_registration_no"></div>
                        </div>
                    </div>

                    {{-- registration date --}}
                    <div class="section">
                        <label class="section-title fs-4">Registration Date</label>
                        <div class="section-input">
                            <input type="date" class="w-100" name="registration_date" value="{{ old('registration_date') }}" required>
                            <div class="error-message text-danger" data-error-for="registration_date"></div>
                        </div>
                    </div>
                </div>

            </div>


            {{-- Personal information --}}
            <div>
                <h2 class="m-0">Personal Information</h2>
                <hr class="mt-2">

                <div class="px-2 d-grid gap-2">

                    {{-- lastname --}}
                    <div class="section">
                        <label class="section-title fs-4">Last name</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="lastname" value="{{ old('lastname') }}" required>
                            <div class="error-message text-danger" data-error-for="lastname"></div>
                        </div>
                    </div>

                    {{-- first name --}}
                    <div class="section">
                        <label class="section-title fs-4">First name</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="firstname" value="{{ old('firstname') }}" required>
                            <div class="error-message text-danger" data-error-for="firstname"></div>
                        </div>
                    </div>

                    {{-- middle name --}}
                    <div class="section">
                        <label class="section-title fs-4">Middle name</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="middlename" value="{{ old('middlename') }}">
                        </div>
                    </div>

                    {{-- birth date --}}
                    <div class="section">
                        <label class="section-title fs-4">Date of birth</label>
                        <div class="section-input">
                            <input type="date" class="w-100" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                            <div class="error-message text-danger" data-error-for="date_of_birth"></div>
                        </div>
                    </div>

                    {{-- place of birth --}}
                    <div class="section">
                        <label class="section-title fs-4">Place of birth</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="place_of_birth" value="{{ old('place_of_birth') }}" required>
                            <div class="error-message text-danger" data-error-for="place_of_birth"></div>
                        </div>
                    </div>

                    {{-- gender --}}
                    <div class="section">
                        <label class="section-title fs-4">Gender</label>
                        <div class="section-input">
                            <div class="radio-wrapper">
                                <input type="radio" name="gender" id="gender_male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                <label class="fs-5" for="gender_male">Male</label>
                            </div>
                            <div class="radio-wrapper">
                                <input type="radio" name="gender" id="gender_female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label class="fs-5" for="gender_female">Female</label>
                            </div>
                            <div class="error-message text-danger" data-error-for="gender"></div>
                        </div>
                    </div>

                    {{-- civil status --}}
                    <div class="section">
                        <label class="section-title fs-4">Civil status</label>
                        <div class="section-input">
                            <select name="civil_status" required>
                                <option selected disabled value="">Select status</option>
                                <option value="single" {{ old('civil_status') == 'single' ? 'selected' : '' }}>Single</option>
                                <option value="married" {{ old('civil_status') == 'married' ? 'selected' : '' }}>Married</option>
                                <option value="divorced" {{ old('civil_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="widowed" {{ old('civil_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                            <div class="error-message text-danger" data-error-for="civil_status"></div>
                        </div>
                    </div>

                    {{-- religion --}}
                    <div class="section">
                        <label class="section-title fs-4">Religion</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="religion" value="{{ old('religion') }}">
                        </div>
                    </div>

                    {{-- Home Address --}}
                    <div class="section">
                        <label class="section-title fs-4">Home Address</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="home_address" value="{{ old('home_address') }}" required>
                            <div class="error-message text-danger" data-error-for="home_address"></div>
                        </div>
                    </div>

                    {{-- office tel no --}}
                    <div class="section">
                        <label class="section-title fs-4">Office Tel. No.</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="office_tel_no" value="{{ old('office_tel_no') }}" required>
                            <div class="error-message text-danger" data-error-for="office_tel_no"></div>
                        </div>
                    </div>

                    {{-- mobile number --}}
                    <div class="section">
                        <label class="section-title fs-4">Mobile Phone No.</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="mobile_phone_no" value="{{ old('mobile_phone_no') }}" required>
                            <div class="error-message text-danger" data-error-for="mobile_phone_no"></div>
                        </div>
                    </div>

                    {{-- Company name --}}
                    <div class="section">
                        <label class="section-title fs-4">Company Name</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="company_name" value="{{ old('company_name') }}" required>
                            <div class="error-message text-danger" data-error-for="company_name"></div>
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="section">
                        <label class="section-title fs-4">Email</label>
                        <div class="section-input">
                            <input type="email" class="w-100" name="email" value="{{ old('email') }}" required>
                            <div class="error-message text-danger" data-error-for="email"></div>
                        </div>
                    </div>

                    {{-- Company address --}}
                    <div class="section">
                        <label class="section-title fs-4">Company Address</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="company_address" value="{{ old('company_address') }}" required>
                            <div class="error-message text-danger" data-error-for="company_address"></div>
                        </div>
                    </div>

                    {{-- Position --}}
                    <div class="section">
                        <label class="section-title fs-4">Position</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="position" value="{{ old('position') }}" required>
                            <div class="error-message text-danger" data-error-for="position"></div>
                        </div>
                    </div>

                    {{-- Sector --}}
                    <div class="section">
                        <label class="section-title fs-4">Sector</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="sector" value="{{ old('sector') }}" required>
                            <div class="error-message text-danger" data-error-for="sector"></div>
                        </div>
                    </div>

                </div>

            </div>


            {{-- educational details --}}
            <div>
                <h2 class="m-0">Educational Details</h2>
                <hr class="mt-2">

                <div class="px-2 d-grid gap-2">

                    {{-- baccalaureate degree --}}
                    <div class="section">
                        <label class="section-title fs-4">Baccalaureate Degree</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="baccalaureate_degree" value="{{ old('baccalaureate_degree') }}" required>
                            <div class="error-message text-danger" data-error-for="baccalaureate_degree"></div>
                        </div>
                    </div>

                    {{-- baccalaureate college/university --}}
                    <div class="section">
                        <label class="section-title fs-4">Baccalaureate College/University</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="baccalaureate_college" value="{{ old('baccalaureate_college') }}" required>
                            <div class="error-message text-danger" data-error-for="baccalaureate_college"></div>
                        </div>
                    </div>

                    {{-- baccalaureate year graduated --}}
                    <div class="section">
                        <label class="section-title fs-4">Baccalaureate Year Graduated</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="baccalaureate_year" value="{{ old('baccalaureate_year') }}" required>
                            <div class="error-message text-danger" data-error-for="baccalaureate_year"></div>
                        </div>
                    </div>

                    {{-- Post graduate degree --}}
                    <div class="section">
                        <label class="section-title fs-4">Post Graduate Degree</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="post_graduate_degree" value="{{ old('post_graduate_degree') }}" required>
                            <div class="error-message text-danger" data-error-for="post_graduate_degree"></div>
                        </div>
                    </div>

                    {{-- post gradaute college/university --}}
                    <div class="section">
                        <label class="section-title fs-4">Post Graduate College/University</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="post_graduate_college" value="{{ old('post_graduate_college') }}" required>
                            <div class="error-message text-danger" data-error-for="post_graduate_college"></div>
                        </div>
                    </div>

                    {{-- post gradaute college/university --}}
                    <div class="section">
                        <label class="section-title fs-4">Post Graduate Year</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="post_graduate_year" value="{{ old('post_graduate_year') }}" required>
                            <div class="error-message text-danger" data-error-for="post_graduate_year"></div>
                        </div>
                    </div>

                    {{-- fields of specialization --}}
                    <div class="section">
                        <label class="section-title fs-4">Fields of Specialization</label>
                        <div class="section-input">
                            <input type="text" class="w-100" name="fields_of_specialization" value="{{ old('fields_of_specialization') }}" required>
                            <div class="error-message text-danger" data-error-for="fields_of_specialization"></div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- submit button --}}
            <div>
                <button type="submit" class="d-block mx-auto">Submit</button>
            </div>

        </form>
    </div>

    {{-- signin dialog --}}
    <dialog id="application-form-dialog">
        <header>Application form <button>&times;</button></header>
        <div>
            <p>Kindly download the application form by clicking the button below. The Application ID is located on the bottom-right corner of the file. You will use it when you are to upload the application form on <a class="redirect-membership">Membership page</a>.</p>
            <button type="button">Download</button>
        </div>
    </dialog>
@endsection

@section('script')

    {{-- jsdpdf --}}
    <script src="{{ asset('js/jspdf.umd.min.js') }}"></script>

    {{-- page script --}}
    <script>
        $('dialog#application-form-dialog>header>button, a.redirect-membership').on('click', function() {
            let response = confirm("Make sure you have downloaded the PDF file before closing. Continue?")
            if (response) {
                window.location.href = '/membership';
            }
        })

        $('form#application-form input[type=file]').on('change input', function() {
            $('div.photo-preview>img').attr('src', URL.createObjectURL(this.files[0]))
        })

        $('form#application-form input:not([type=radio])').on('change input', function() {
            let errorMessageDiv = $(this).siblings('div.error-message');
            errorMessageDiv.fadeOut(function() {
                errorMessageDiv.empty()
            })
        })

        $('form#application-form input[type=radio]').on('change input', function() {
            let errorMessageDiv = $(this).parent().siblings('div.error-message');
            errorMessageDiv.fadeOut(function() {
                errorMessageDiv.empty()
            })
        })

        $('form#application-form').on('submit', function(e) {
            e.preventDefault()
            $('#popup-alert-wrapper').empty()
            $('form#application-form button[type=submit]').attr('disabled', true)

            let formValues = $(this).serializeArray() // serialize all inputs
            let body = new FormData() // create new instance for form data

            // append all serialized inputs
            formValues.forEach(input => {
                body.append(input['name'], input['value'])
            });

            // append the image file
            let photo = $('input[type=file][name=photo]')[0].files[0];
            if (photo !== undefined) body.append('photo', photo, photo['name']);

            fetch('/application/submit', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    body: body
                })
                .then(res => res.json())
                .then(res => {
                    console.dir(res)
                    if (res['status'] == 200) {
                        generatePdf(res['data'])
                        $('dialog#application-form-dialog')[0].showModal()
                    } else {
                        $.each(res['data'], function(name, error_messages) {
                            error_messages.forEach(msg => {
                                $(`div.error-message[data-error-for=${name}]`).append(
                                    `<p class="mb-0">${msg}</p>`
                                )
                            });
                        });
                        $('#popup-alert-wrapper').html(`
                            <div class="alert alert-${res['toast']['type']} alert-dismissible fade show" role="alert">
                                ${res['toast']['message']}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `)
                    }
                    $('form#application-form button[type=submit]').attr('disabled', false)
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

            // membership
            if (applicationData['membership'] == 'regular')
                doc.text('X', 5.21, 2.91) // regular
            else
                doc.text('X', 6.505, 2.91) // associate

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

            $('dialog#application-form-dialog>div>button').on('click', function() {
                doc.save(`pice-application-${applicationData['application_id']}`)
            })

        }
    </script>
@endsection
