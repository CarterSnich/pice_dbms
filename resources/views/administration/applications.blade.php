@extends('layouts.administration_layout')

@section('style')
    <style>
        html {
            overflow: hidden
        }

        #content {
            display: flex;
            flex-flow: column;
            height: calc(100vh - 3.25rem);
            padding: 1.25rem;
        }

        .table-wrapper {
            height: 100%;
            flex-grow: 1;
            overflow: auto;
        }


        table>thead {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        thead th {
            vertical-align: auto;
            text-align: left;
        }

        img[data-application=photo] {
            min-height: 200px;
            min-width: 200px;
            height: 200px;
            width: 200px;
        }

        .action-buttons {
            min-width: max-content;

        }
    </style>
@endsection
@section('content')
    {{-- top nav bar --}}
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Applications</span>
        </div>
    </nav>

    <div id="content">

        {{-- table wrapper --}}
        <div class="table-wrapper">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr class="shadow-sm">
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">PRC Reg. #</th>
                        <th scope="col">Application type</th>
                        <th scope="col">Membership status</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach ($applications as $application)
                        <tr data-application-id="{{ $application['id'] }}">
                            <td>
                                <a href="#" class="text-decoration-none" data-application-id="{{ $application->id }}">{{ $application['date'] }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-application-id="{{ $application->id }}">{{ $application['lastname'] }}, {{ $application['firstname'] }} {{ $application['middlename'][0] ?? '' }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-application-id="{{ $application->id }}">{{ $application['prc_registration_no'] }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-application-id="{{ $application->id }}">{{ ucfirst($application['membership']) }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-application-id="{{ $application->id }}">{{ ucfirst($application['membership_status']) }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-application-id="{{ $application->id }}">{{ $application['status'] == 'pending' ? 'Pending' : 'Not Approved' }}</a>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    {{-- application form --}}
                                    @if ($application->application_form)
                                        <a class="btn btn-primary btn-sm" href="/administration/applications/form/{{ $application->id }}" data-has-tooltip="true" data-bs-placement="top" title="View application form" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                            </svg>
                                        </a>
                                    @else
                                        <a class="btn btn-primary btn-sm disabled" href="#" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                            </svg>
                                        </a>
                                    @endif

                                    {{-- reject/approve button --}}
                                    @if (request()->get('status') == 'pending')
                                        {{-- approve button --}}
                                        @if ($application->date_paid && $application->application_form)
                                            <button class="approve-application-button btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#confirm-approval-modal" data-application-id="{{ $application->id }}" data-has-tooltip="true" data-bs-placement="top" title="Approve">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                </svg>
                                            </button>
                                        @else
                                            <span class="d-inline-block" tabindex="0" data-has-tooltip="true" data-bs-placement="top" title="Cannot approve without payment and form">
                                                <button class="approve-application-button btn btn-primary btn-sm disabled" disabled>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                        {{-- reject button --}}
                                        <button class="reject-application-button btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reject-application-modal" data-application-id="{{ $application->id }}" data-has-tooltip="true" data-bs-placement="top" title="Reject application">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- view application modal --}}
    <div class="modal fade show " id="view-application-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Membership Application / Update Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- application details --}}
                    <div id="application-details-wrapper" class="d-grid gap-3">

                        {{-- application information --}}
                        <div>
                            <h4 class="mb-3">Application information</h4>
                            <div class="d-flex">
                                <div class="row gap-3">

                                    {{-- date --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Date:</p><strong class="col-8 border px-2 py-1" data-application="date"></strong>
                                    </div>

                                    {{-- application id --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Application ID:</p><strong class="col-8 border px-2 py-1" data-application="application_id"></strong>
                                    </div>

                                    {{-- Application for --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Membership:</p><strong class="col-8 border px-2 py-1" data-application="membership"></strong>
                                    </div>

                                    {{-- membership status --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Membership status:</p><strong class="col-8 border px-2 py-1" data-application="membership_status"></strong>
                                    </div>

                                    {{-- prc registration no --}}
                                    <div class="col-6 row">
                                        <p class="col-4">PRC Registration #:</p><strong class="col-8 border px-2 py-1" data-application="prc_registration_no"></strong>
                                    </div>

                                    {{-- chapter --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Chapter:</p><strong class="col-8 border px-2 py-1" data-application="chapter"></strong>
                                    </div>

                                    {{-- registration date --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Registration date:</p><strong class="col-8 border px-2 py-1" data-application="registration_date"></strong>
                                    </div>

                                    {{-- year_chap_no_natl_no --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Year/Chap No/Natl No:</p><strong class="col-8 border px-2 py-1" data-application="year_chap_no_natl_no"></strong>
                                    </div>

                                </div>

                                {{-- photo --}}
                                <div>
                                    <img src="" alt="photo" class="img-thumbnail" data-application="photo">
                                </div>
                            </div>
                            <hr class="w-auto flex-fill">
                        </div>

                        {{-- personal information --}}
                        <div>
                            <h4 class="mb-3">Personal information</h4>
                            <div class="row gap-3">

                                {{-- lastname --}}
                                <div class="col-6 row">
                                    <p class="col-4">Last Name:</p><strong class="col-8 border px-2 py-1" data-application="lastname"></strong>
                                </div>

                                {{-- firstname --}}
                                <div class="col-6 row">
                                    <p class="col-4">First Name:</p><strong class="col-8 border px-2 py-1" data-application="firstname"></strong>
                                </div>

                                {{-- middlename --}}
                                <div class="col-6 row">
                                    <p class="col-4">Middle name:</p><strong class="col-8 border px-2 py-1" data-application="middlename"></strong>
                                </div>

                                {{-- date of birth --}}
                                <div class="col-6 row">
                                    <p class="col-4">Date of birth:</p><strong class="col-8 border px-2 py-1" data-application="date_of_birth"></strong>
                                </div>

                                {{-- place_of_birth --}}
                                <div class="col-6 row">
                                    <p class="col-4">Place of birth:</p><strong class="col-8 border px-2 py-1" data-application="place_of_birth"></strong>
                                </div>

                                {{-- gender --}}
                                <div class="col-6 row">
                                    <p class="col-4">Gender:</p><strong class="col-8 border px-2 py-1" data-application="gender"></strong>
                                </div>

                                {{-- civil status --}}
                                <div class="col-6 row">
                                    <p class="col-4">Civil status:</p><strong class="col-8 border px-2 py-1" data-application="civil_status"></strong>
                                </div>

                                {{-- religion --}}
                                <div class="col-6 row">
                                    <p class="col-4">Religion:</p><strong class="col-8 border px-2 py-1" data-application="religion"></strong>
                                </div>

                                {{-- home address --}}
                                <div class="col-6 row">
                                    <p class="col-4">Home address:</p><strong class="col-8 border px-2 py-1" data-application="home_address"></strong>
                                </div>

                                {{-- office tel no --}}
                                <div class="col-6 row">
                                    <p class="col-4">Office Tel. No.:</p><strong class="col-8 border px-2 py-1" data-application="office_tel_no"></strong>
                                </div>

                                {{-- mobile phone no --}}
                                <div class="col-6 row">
                                    <p class="col-4">Mobile Phone No.:</p><strong class="col-8 border px-2 py-1" data-application="mobile_phone_no"></strong>
                                </div>

                                {{-- company name --}}
                                <div class="col-6 row">
                                    <p class="col-4">Company Name:</p><strong class="col-8 border px-2 py-1" data-application="company_name"></strong>
                                </div>

                                {{-- email --}}
                                <div class="col-6 row">
                                    <p class="col-4">Email Address:</p><strong class="col-8 border px-2 py-1" data-application="email"></strong>
                                </div>

                                {{-- company address --}}
                                <div class="col-6 row">
                                    <p class="col-4">Company Address:</p><strong class="col-8 border px-2 py-1" data-application="company_address"></strong>
                                </div>

                                {{-- position --}}
                                <div class="col-6 row">
                                    <p class="col-4">Position:</p><strong class="col-8 border px-2 py-1" data-application="position"></strong>
                                </div>

                                {{-- sector --}}
                                <div class="col-6 row">
                                    <p class="col-4">Sector:</p><strong class="col-8 border px-2 py-1" data-application="sector"></strong>
                                </div>
                            </div>
                            <hr class="w-auto flex-fill">
                        </div>

                        {{-- educational details --}}
                        <div>
                            <h4 class="mb-3">Education details</h4>
                            <div class="row gap-3">

                                {{-- baccalaureate degree --}}
                                <div class="col-6 row">
                                    <p class="col-4">Baccalaureate Degree:</p><strong class="col-8 border px-2 py-1" data-application="baccalaureate_degree"></strong>
                                </div>

                                {{-- post graduate degree --}}
                                <div class="col-6 row">
                                    <p class="col-4">Post Graduate Degree:</p><strong class="col-8 border px-2 py-1" data-application="post_graduate_degree"></strong>
                                </div>

                                {{-- baccalaureate college/university --}}
                                <div class="col-6 row">
                                    <p class="col-4">College / University:</p><strong class="col-8 border px-2 py-1" data-application="baccalaureate_college"></strong>
                                </div>

                                {{-- post granduate college/university --}}
                                <div class="col-6 row">
                                    <p class="col-4">College / University:</p><strong class="col-8 border px-2 py-1" data-application="post_graduate_college"></strong>
                                </div>

                                {{-- baccalaureate graduate year --}}
                                <div class="col-6 row">
                                    <p class="col-4">Year Graduated:</p><strong class="col-8 border px-2 py-1" data-application="baccalaureate_year"></strong>
                                </div>

                                {{-- post graduate year --}}
                                <div class="col-6 row">
                                    <p class="col-4">Year Graduated:</p><strong class="col-8 border px-2 py-1" data-application="post_graduate_year"></strong>
                                </div>

                                {{-- fields of specialization --}}
                                <div class="col-12 row">
                                    <p class="col-3">Fields of Specialization:</p><strong class="col-9 border px-2 py-1" data-application="fields_of_specialization"></strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- confirm approval --}}
    <div class="modal" tabindex="-1" id="confirm-approval-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approve application?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Confirm approval of this application?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="confirm btn btn-primary d-flex align-items-center gap-1">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span>Confirm</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- rejection modal --}}
    <div class="modal fade" id="reject-application-modal" tabindex="-1" aria-hidden="true" data-disable-closing="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            Provide a reason why the application is rejected. It will be emailed to the applicant.
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="d-flex align-items-center gap-1 confirm btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span>Send message</span>
                    </button>
                </div>
            </div>
        </div>
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

        // view application modal
        let viewApplicationModal = new bootstrap.Modal(document.getElementById('view-application-modal'))

        $('table tbody>tr>td>a').on('click', function() {
            let applicationId = $(this).attr('data-application-id')
            let body = new FormData()
            body.append('application_id', applicationId)

            fetch('/administration/applications/get_application', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: body
                })
                .then((res) => res.json())
                .then((res) => {
                    let application = res['application']

                    // application details
                    $(`[data-application=date]`).text(moment(application['date']).format('LL'))
                    $(`[data-application=application_id]`).text(application['application_id'])
                    $(`[data-application=membership_status]`).text(ucfirst(application['membership_status']))
                    $(`[data-application=chapter]`).text(application['chapter'])
                    $(`[data-application=year_chap_no_natl_no]`).text(application['year_chap_no_natl_no'])
                    $(`[data-application=photo]`).attr('src', `/storage/photos/${application['photo']}`)
                    $(`[data-application=membership]`).text(ucfirst(application['membership']))
                    $(`[data-application=prc_registration_no]`).text(application['prc_registration_no'])
                    $(`[data-application=registration_date]`).text(moment(application['registration_date']).format('LL'))

                    // applicant information
                    $(`[data-application=lastname]`).text(application['lastname'])
                    $(`[data-application=firstname]`).text(application['firstname'])
                    $(`[data-application=middlename]`).text(application['middlename'])
                    $(`[data-application=date_of_birth]`).text(moment(application['date_of_birth']).format('LL'))
                    $(`[data-application=place_of_birth]`).text(application['place_of_birth'])
                    $(`[data-application=gender]`).text(ucfirst(application['gender']))
                    $(`[data-application=civil_status]`).text(application['civil_status'])
                    $(`[data-application=religion]`).text(application['religion'])
                    $(`[data-application=home_address]`).text(application['home_address'])
                    $(`[data-application=office_tel_no]`).text(application['office_tel_no'])
                    $(`[data-application=mobile_phone_no]`).text(application['  mobile_phone_no'])
                    $(`[data-application=company_name]`).text(application['company_name'])
                    $(`[data-application=email]`).text(application['email'])
                    $(`[data-application=company_address]`).text(application['company_address'])
                    $(`[data-application=position]`).text(application['position'])
                    $(`[data-application=sector]`).text(application['sector'])

                    // educational details
                    $(`[data-application=baccalaureate_degree]`).text(application['baccalaureate_degree'])
                    $(`[data-application=baccalaureate_college]`).text(application['baccalaureate_college'])
                    $(`[data-application=baccalaureate_year]`).text(application['baccalaureate_year'])
                    $(`[data-application=post_graduate_degree]`).text(application['post_graduate_degree'])
                    $(`[data-application=post_graduate_college]`).text(application['post_graduate_college'])
                    $(`[data-application=post_graduate_year]`).text(application['post_graduate_year'])
                    $(`[data-application=fields_of_specialization]`).text(application['fields_of_specialization'])

                    viewApplicationModal.show()
                })
                .catch((err) => {
                    console.error(err)
                    alert('Failed to fetch application data.')
                });


        })

        let approveApplicationModalElem = document.getElementById('confirm-approval-modal')
        let approveApplicationModal = bootstrap.Modal.getOrCreateInstance(approveApplicationModalElem)
        approveApplicationModalElem.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let applicationId = button.getAttribute('data-application-id')
            $(this).find('button.confirm').attr('data-application-id', applicationId)
        })

        approveApplicationModalElem.addEventListener('hide.bs.modal', function(event) {
            if (approveApplicationModalElem.hasAttribute('data-disable-closing')) {
                event.preventDefault()
            }
        })

        $(approveApplicationModalElem).find('button.confirm').on('click', function(e) {
            let button = $(this)
            let applicationId = $(this).attr('data-application-id')

            approveApplicationModalElem.setAttribute('data-disable-closing', '')
            $(this).addClass('disabled', true).addClass('disabled')
            $(this).children('span.spinner-border').removeClass('d-none')

            fetch(`/administration/applications/approve/${applicationId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(res => res.json())
                .then(res => {
                    if (res.status == 200) {
                        $(`table tbody tr[data-application-id=${applicationId}]`).remove()
                    }

                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Application')
                    $('#toast-wrapper>.toast').find('.toast-body').text(res['toast']['message'])
                    toast.show()

                    approveApplicationModalElem.removeAttribute('data-disable-closing')
                    button.attr('disabled', false).removeClass('disabled')
                    button.children('span.spinner-border').addClass('d-none')
                    approveApplicationModal.hide()
                })
                .catch((err) => {
                    console.error(err)
                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Application')
                    $('#toast-wrapper>.toast').find('.toast-body').text('Something happened.')
                    toast.show()

                    approveApplicationModalElem.removeAttribute('data-disable-closing')
                    button.attr('disabled', false).removeClass('disabled')
                    button.children('span.spinner-border').addClass('d-none')
                    approveApplicationModal.hide()
                });

        })


        let rejectApplicationModalElem = document.getElementById('reject-application-modal')
        let rejectApplicationModal = new bootstrap.Modal(rejectApplicationModalElem)
        rejectApplicationModalElem.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let applicationId = button.getAttribute('data-application-id')
            $(this).find('button.confirm').attr('data-application-id', applicationId)
        })

        rejectApplicationModalElem.addEventListener('hide.bs.modal', function(event) {
            if (rejectApplicationModalElem.hasAttribute('data-disable-closing')) {
                event.preventDefault();
            }
        })

        $(rejectApplicationModalElem).find('button.confirm').on('click', function(event) {
            let applicationId = $(this).attr('data-application-id')
            let reasonMessage = $(rejectApplicationModalElem).find('textarea').val();

            if (reasonMessage.length == 0) {
                alert('Please, provide a reason.')
                return
            }

            let button = $(this)
            rejectApplicationModalElem.setAttribute('data-disable-closing', '');
            button.addClass('disabled').attr('disabled', true)
            button.children('span.spinner-border').removeClass('d-none')

            let body = new FormData()
            body.append('reject_reason', reasonMessage)

            fetch(`/administration/applications/reject/${applicationId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: body
                })
                .then(res => res.json())
                .then(res => {
                    if (res.status == 200) {
                        $(`table tbody tr[data-application-id=${applicationId}]`).remove()
                    }
                    rejectApplicationModalElem.removeAttribute('data-disable-closing');
                    rejectApplicationModal.hide()
                    button.children('span.spinner-border').addClass('d-none')
                    button.removeClass('disabled').attr('disabled', false)

                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Application')
                    $('#toast-wrapper>.toast').find('.toast-body').text(res['toast']['message'])
                    toast.show()
                })
                .catch((err) => {
                    console.error(err)
                    alert('Something happened.')
                });
        })


        // fetches new applicatons from database
        setInterval(() => {
            fetch(`/administration/applications/get_applications?status=${(new URL(document.location)).searchParams.get('status')}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then((res) => res.json())
                .then((res) => {
                    if (res.status == 200) {
                        res.data.forEach(application => {
                            if (!$(`tr [data-application-id=${application.id}]`).length) {
                                $('table tbody').prepend(`
                                    <tr data-application-id="${application.id}">
                                        <td>
                                            <a href="#" class="text-decoration-none" data-application-id="${application.id}">${application.date}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-decoration-none" data-application-id="${application.id}">{{ $application['lastname'] }}, {{ $application['firstname'] }} {{ $application['middlename'][0] ?? '' }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-decoration-none" data-application-id="${application.id}">{{ $application['prc_registration_no'] }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-decoration-none" data-application-id="${application.id}">{{ ucfirst($application['membership']) }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-decoration-none" data-application-id="${application.id}">{{ ucfirst($application['membership_status']) }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-decoration-none" data-application-id="${application.id}">${application.status == 'pending' ? 'Pending' : 'Approved'}</a>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                ${
                                                    application.application_form ? `
                                                                                                                            <a class="btn btn-primary btn-sm" href="/administration/applications/form/${application.id}" data-has-tooltip="true" data-bs-placement="top" title="View application form" target="_blank">
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                                                                                                    <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                                                                                                    <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                                                                                                </svg>
                                                                                                                            </a>
                                                                                                                        ` : `
                                                                                                                            <a class="btn btn-primary btn-sm disabled" href="#" disabled>
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                                                                                                    <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                                                                                                    <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                                                                                                </svg>
                                                                                                                            </a>
                                                                                                                        `

                                                }
                                                ${
                                                    application.date_paid && application.application_form ?
                                `
                                                    <button class="approve-application-button btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#confirm-approval-modal" data-application-id="${application.id}" data-has-tooltip="true" data-bs-placement="top" title="Approve">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                    </svg>
                                                    </button>
                                                    `
                                :
                                `
                                                    <span class="d-inline-block" tabindex="0" data-has-tooltip="true" data-bs-placement="top" title="Cannot approve without payment and form">
                                                    <button class="approve-application-button btn btn-primary btn-sm disabled" disabled>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                    </svg>
                                                    </button>
                                                    </span>
                                                    `
                                                                                }

                                                                                <button class="reject-application-button btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reject-application-modal" data-application-id="${application.id}" data-has-tooltip="true" data-bs-placement="top" title="Reject application">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                `);
                            }
                        });

                    } else {
                        $('#toast-wrapper>.toast').find('.toast-header>strong').text('Applications')
                        $('#toast-wrapper>.toast').find('.toast-body').text(res['toast']['message'])
                        toast.show()
                    }

                })
                .catch((err) => {
                    console.error(err)
                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Applications')
                    $('#toast-wrapper>.toast').find('.toast-body').text('Something happened.')
                    toast.show()
                });
        }, 3000);
    </script>
@endsection
