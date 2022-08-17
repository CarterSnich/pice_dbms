@extends('layouts.administration_layout')

@section('header_title', ucfirst(request()->type) . ' members')

@section('style')
    <style>
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
        }


        img[data-member=photo] {
            min-height: 200px;
            min-width: 200px;
            height: 200px;
            width: 200px;
        }
    </style>
@endsection


@section('content')
    {{-- top nav bar --}}
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">{{ ucfirst(request()->get('membership')) }} Members</span>
        </div>
    </nav>

    <div id="content">

        {{-- table wrapper --}}
        <div class="table-wrapper">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr class="shadow-sm">
                        <th scope="col">Membership ID</th>
                        <th scope="col">Last name</th>
                        <th scope="col">First name</th>
                        <th scope="col">Middle name</th>
                        <th scope="col">PRC Reg. #</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach ($members as $member)
                        <tr data-member-id="{{ $member->id }}">
                            <td>
                                <a href="#" class="text-decoration-none" data-member-id="{{ $member->id }}" data-bs-toggle="modal">
                                    {{ $member->membership_id }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-member-id="{{ $member->id }}">
                                    {{ $member->lastname }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-member-id="{{ $member->id }}">
                                    {{ $member->firstname }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-member-id="{{ $member->id }}">
                                    {{ $member->middlename }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-member-id="{{ $member->id }}">
                                    {{ $member->prc_registration_no }}
                                </a>
                            </td>
                            <td>
                                <div class="d-inline">
                                    <a href="/administration/members/{{ $member->id }}/edit" class="btn btn-primary btn-sm" data-member-id="{{ $member->id }}">
                                        Update
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <td>
                            <div>
                                @if ($application['application_form'])
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
                                <button class="approve-application-button btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#confirm-approval-modal" data-member-id="{{ $application->id }}" data-has-tooltip="true" data-bs-placement="top" title="Approve">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                    </svg>
                                </button>
                                <button class="reject-application-button btn btn-danger btn-sm" data-bs-toggle="modal" data-member-id="{{ $application->id }}" data-has-tooltip="true" data-bs-placement="top" title="Reject">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                    </svg>
                                </button>
                            </div>
                        </td> --}}
                </tbody>
            </table>
        </div>
    </div>

    {{-- view member details modal --}}
    <div class="modal fade show " id="view-member-details-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Member ID #<span class="text-info" id="header-membership-id"></span>, <span id="header-full-name"></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- member details --}}
                    <div id="member-details-wrapper" class="d-grid gap-3">

                        {{-- membership information --}}
                        <div>
                            <h4 class="mb-3">Member information</h4>
                            <div class="d-flex">
                                <div class="row gap-3">

                                    {{-- membership id --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Membership ID:</p><strong class="col-8 border px-2 py-1" data-member="membership_id"></strong>
                                    </div>

                                    {{-- role --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Role:</p><strong class="col-8 border px-2 py-1" data-member="role"></strong>
                                    </div>

                                    {{-- membership --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Membership:</p><strong class="col-8 border px-2 py-1" data-member="membership"></strong>
                                    </div>

                                    {{-- membership status --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Membership status:</p><strong class="col-8 border px-2 py-1" data-member="membership_status"></strong>
                                    </div>

                                    {{-- prc registration no --}}
                                    <div class="col-6 row">
                                        <p class="col-4">PRC Registration #:</p><strong class="col-8 border px-2 py-1" data-member="prc_registration_no"></strong>
                                    </div>

                                    {{-- chapter --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Chapter:</p><strong class="col-8 border px-2 py-1" data-member="chapter"></strong>
                                    </div>

                                    {{-- registration date --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Registration date:</p><strong class="col-8 border px-2 py-1" data-member="registration_date"></strong>
                                    </div>

                                    {{-- year_chap_no_natl_no --}}
                                    <div class="col-6 row">
                                        <p class="col-4">Year/Chap No/Natl No:</p><strong class="col-8 border px-2 py-1" data-member="year_chap_no_natl_no"></strong>
                                    </div>

                                </div>

                                {{-- photo --}}
                                <div>
                                    <img src="" alt="photo" class="img-thumbnail" data-member="photo">
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
                                    <p class="col-4">Last Name:</p><strong class="col-8 border px-2 py-1" data-member="lastname"></strong>
                                </div>

                                {{-- firstname --}}
                                <div class="col-6 row">
                                    <p class="col-4">First Name:</p><strong class="col-8 border px-2 py-1" data-member="firstname"></strong>
                                </div>

                                {{-- middlename --}}
                                <div class="col-6 row">
                                    <p class="col-4">Middle name:</p><strong class="col-8 border px-2 py-1" data-member="middlename"></strong>
                                </div>

                                {{-- date of birth --}}
                                <div class="col-6 row">
                                    <p class="col-4">Date of birth:</p><strong class="col-8 border px-2 py-1" data-member="date_of_birth"></strong>
                                </div>

                                {{-- place_of_birth --}}
                                <div class="col-6 row">
                                    <p class="col-4">Place of birth:</p><strong class="col-8 border px-2 py-1" data-member="place_of_birth"></strong>
                                </div>

                                {{-- gender --}}
                                <div class="col-6 row">
                                    <p class="col-4">Gender:</p><strong class="col-8 border px-2 py-1" data-member="gender"></strong>
                                </div>

                                {{-- civil status --}}
                                <div class="col-6 row">
                                    <p class="col-4">Civil status:</p><strong class="col-8 border px-2 py-1" data-member="civil_status"></strong>
                                </div>

                                {{-- religion --}}
                                <div class="col-6 row">
                                    <p class="col-4">Religion:</p><strong class="col-8 border px-2 py-1" data-member="religion"></strong>
                                </div>

                                {{-- home address --}}
                                <div class="col-6 row">
                                    <p class="col-4">Home address:</p><strong class="col-8 border px-2 py-1" data-member="home_address"></strong>
                                </div>

                                {{-- office tel no --}}
                                <div class="col-6 row">
                                    <p class="col-4">Office Tel. No.:</p><strong class="col-8 border px-2 py-1" data-member="office_tel_no"></strong>
                                </div>

                                {{-- mobile phone no --}}
                                <div class="col-6 row">
                                    <p class="col-4">Mobile Phone No.:</p><strong class="col-8 border px-2 py-1" data-member="mobile_phone_no"></strong>
                                </div>

                                {{-- company name --}}
                                <div class="col-6 row">
                                    <p class="col-4">Company Name:</p><strong class="col-8 border px-2 py-1" data-member="company_name"></strong>
                                </div>

                                {{-- email --}}
                                <div class="col-6 row">
                                    <p class="col-4">Email Address:</p><strong class="col-8 border px-2 py-1" data-member="email"></strong>
                                </div>

                                {{-- company address --}}
                                <div class="col-6 row">
                                    <p class="col-4">Company Address:</p><strong class="col-8 border px-2 py-1" data-member="company_address"></strong>
                                </div>

                                {{-- position --}}
                                <div class="col-6 row">
                                    <p class="col-4">Position:</p><strong class="col-8 border px-2 py-1" data-member="position"></strong>
                                </div>

                                {{-- sector --}}
                                <div class="col-6 row">
                                    <p class="col-4">Sector:</p><strong class="col-8 border px-2 py-1" data-member="sector"></strong>
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
                                    <p class="col-4">Baccalaureate Degree:</p><strong class="col-8 border px-2 py-1" data-member="baccalaureate_degree"></strong>
                                </div>

                                {{-- post graduate degree --}}
                                <div class="col-6 row">
                                    <p class="col-4">Post Graduate Degree:</p><strong class="col-8 border px-2 py-1" data-member="post_graduate_degree"></strong>
                                </div>

                                {{-- baccalaureate college/university --}}
                                <div class="col-6 row">
                                    <p class="col-4">College / University:</p><strong class="col-8 border px-2 py-1" data-member="baccalaureate_college"></strong>
                                </div>

                                {{-- post granduate college/university --}}
                                <div class="col-6 row">
                                    <p class="col-4">College / University:</p><strong class="col-8 border px-2 py-1" data-member="post_graduate_college"></strong>
                                </div>

                                {{-- baccalaureate graduate year --}}
                                <div class="col-6 row">
                                    <p class="col-4">Year Graduated:</p><strong class="col-8 border px-2 py-1" data-member="baccalaureate_year"></strong>
                                </div>

                                {{-- post graduate year --}}
                                <div class="col-6 row">
                                    <p class="col-4">Year Graduated:</p><strong class="col-8 border px-2 py-1" data-member="post_graduate_year"></strong>
                                </div>

                                {{-- fields of specialization --}}
                                <div class="col-12 row">
                                    <p class="col-3">Fields of Specialization:</p><strong class="col-9 border px-2 py-1" data-member="fields_of_specialization"></strong>
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

        let viewMemberDetailsModalElem = document.getElementById('view-member-details-modal')
        let viewMemberDetailsModal = bootstrap.Modal.getOrCreateInstance(viewMemberDetailsModalElem)
        viewMemberDetailsModalElem.addEventListener('show.bs.modal', function(event) {

        })

        $('table tbody tr td>a').on('click', function(event) {
            let memberId = this.getAttribute('data-member-id')
            let body = new FormData();
            body.append('member_id', memberId)

            fetch('/administration/members/get_member', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: body
                })
                .then(res => res.json())
                .then(res => {
                    console.dir(res)

                    switch (res.status) {
                        case 200:
                            let member = res.data
                            let role;

                            switch (member.role) {
                                case 'super_admin':
                                    role = 'Super Administrator';
                                    break;

                                case 'president':
                                    role = 'President';
                                    break;

                                case 'secretary':
                                    role = 'Secretary';
                                    break;

                                case 'treasure':
                                    role = 'Treasure';
                                    break;

                                case 'information_officer':
                                    role = 'Information Officer';
                                    break;

                                default:
                                    role = 'Member';
                                    break;
                            }

                            // modal title
                            $('#view-member-details-modal .modal-title #header-membership-id').text(member.membership_id)
                            $('#view-member-details-modal .modal-title #header-full-name').text(
                                `${member.lastname}, ${member.firstname} ${member.middlename}`
                            )

                            // application details
                            $(`[data-member=membership_id]`).text(member.membership_id)
                            $(`[data-member=role]`).text(role)
                            $(`[data-member=membership_status]`).text(ucfirst(member.membership_status))
                            $(`[data-member=chapter]`).text(member.chapter)
                            $(`[data-member=year_chap_no_natl_no]`).text(member.year_chap_no_natl_no)
                            $(`[data-member=photo]`).attr('src', `/storage/photos/${member.photo}`)
                            $(`[data-member=membership]`).text(ucfirst(member.membership))
                            $(`[data-member=prc_registration_no]`).text(member.prc_registration_no)
                            $(`[data-member=registration_date]`).text(moment(member.registration_date).format('LL'))

                            // applicant information
                            $(`[data-member=lastname]`).text(member.lastname)
                            $(`[data-member=firstname]`).text(member.firstname)
                            $(`[data-member=middlename]`).text(member.middlename)
                            $(`[data-member=date_of_birth]`).text(moment(member.date_of_birth).format('LL'))
                            $(`[data-member=place_of_birth]`).text(member.place_of_birth)
                            $(`[data-member=gender]`).text(ucfirst(member.gender))
                            $(`[data-member=civil_status]`).text(member.civil_status)
                            $(`[data-member=religion]`).text(member.religion)
                            $(`[data-member=home_address]`).text(member.home_address)
                            $(`[data-member=office_tel_no]`).text(member.office_tel_no)
                            $(`[data-member=mobile_phone_no]`).text(member.mobile_phone_no)
                            $(`[data-member=company_name]`).text(member.company_name)
                            $(`[data-member=email]`).text(member.email)
                            $(`[data-member=company_address]`).text(member.company_address)
                            $(`[data-member=position]`).text(member.position)
                            $(`[data-member=sector]`).text(member.sector)

                            // educational details
                            $(`[data-member=baccalaureate_degree]`).text(member.baccalaureate_degree)
                            $(`[data-member=baccalaureate_college]`).text(member.baccalaureate_college)
                            $(`[data-member=baccalaureate_year]`).text(member.baccalaureate_year)
                            $(`[data-member=post_graduate_degree]`).text(member.post_graduate_degree)
                            $(`[data-member=post_graduate_college]`).text(member.post_graduate_college)
                            $(`[data-member=post_graduate_year]`).text(member.post_graduate_year)
                            $(`[data-member=fields_of_specialization]`).text(member.fields_of_specialization)

                            viewMemberDetailsModal.show()
                            break;

                        case 400:
                            event.preventDefault();
                            $('#toast-wrapper>.toast').find('.toast-header>strong').text('Members')
                            $('#toast-wrapper>.toast').find('.toast-body').text(res.toast.message)
                            toast.show()
                            break;

                        case 500:
                            event.preventDefault();
                            $('#toast-wrapper>.toast').find('.toast-header>strong').text('Members')
                            $('#toast-wrapper>.toast').find('.toast-body').text(res.toast.message)
                            toast.show()
                            break;

                        default:
                            event.preventDefault();
                            $('#toast-wrapper>.toast').find('.toast-header>strong').text('Members')
                            $('#toast-wrapper>.toast').find('.toast-body').text('Something happened.')
                            toast.show()
                            break;
                    }
                })
                .catch((err) => {
                    event.preventDefault();
                    console.error(err)
                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Members')
                    $('#toast-wrapper>.toast').find('.toast-body').text('Something happened.')
                    toast.show()
                });
        })
    </script>
@endsection
