@extends('layouts.administration_layout')

@section('style')
    <style>
        #content {
            display: grid;
            gap: 1.5rem;
            grid-template-areas: "sidebar main";
            grid-template-columns: 1fr 3fr;
        }

        #list-wrapper {
            grid-area: sidebar;
        }

        #list-wrapper>.list-group>nav {
            position: sticky;
            top: 0;
            z-index: 1010;
        }

        #list-wrapper>.list-group {
            position: sticky;
            top: 5rem;
            display: block !important;
            height: calc(100vh - 7rem);
            overflow-y: auto;
        }
    </style>
@endsection
@section('content')
    <div id="content" class="row">
        {{-- applicantion list --}}
        <aside id="list-wrapper">
            <div class="list-group list-group-flush">
                {{-- <nav class="bg-secondary d-flex p-1">
                    <p class="mb-0 text-light me-3">Page</p>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav> --}}
                @foreach ($applications as $application)
                    <button type="button" class="list-group-item list-group-item-action" data-app-id="{{ $application['id'] }}" data-app-data="{{ json_encode($application) }}">
                        {{ $application['lastname'] }}, {{ $application['firstname'] }} {{ $application['middlename'][0] ?? '' }}
                        <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                @endforeach
            </div>
        </aside>

        {{-- application details --}}
        <div id="application-details-wrapper">
            <div id="progress-wrapper" class="d-none">
                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div>
                <h2 class="mb-3">Application information</h2>
                <div class="row gap-3">
                    {{-- date --}}
                    <div class="col-6 row">
                        <p class="col-4">Date:</p><strong class="col-8 border px-2 py-1" id="date"></strong>
                    </div>
                    {{-- membership status --}}
                    <div class="col-6 row">
                        <p class="col-4">Membeship status:</p><strong class="col-8 border px-2 py-1" id="new_membership"></strong>
                    </div>
                    {{-- chapter --}}
                    <div class="col-6 row">
                        <p class="col-4">Chapter:</p><strong class="col-8 border px-2 py-1" id="chapter"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">PRC Registration #:</p><strong class="col-8 border px-2 py-1" id="prc_registration_no"></strong>
                    </div>
                    {{-- membership --}}
                    <div class="col-6 row">
                        <p class="col-4">Membership:</p><strong class="col-8 border px-2 py-1" id="membership"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Registration date:</p><strong class="col-8 border px-2 py-1" id="registration_date"></strong>
                    </div>
                    <hr class="mx-2 w-auto flex-fill">
                </div>
            </div>
            <div>
                <h2 class="mb-3">Personal information</h2>
                <div class="row gap-3">
                    <div class="col-6 row">
                        <p class="col-4">Last Name:</p><strong class="col-8 border px-2 py-1" id="lastname"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">First Name:</p><strong class="col-8 border px-2 py-1" id="firstname"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Middle name:</p><strong class="col-8 border px-2 py-1" id="middlename"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Date of birth:</p><strong class="col-8 border px-2 py-1" id="birth_date"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Gender:</p><strong class="col-8 border px-2 py-1" id="gender"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Civil status:</p><strong class="col-8 border px-2 py-1" id="civil_status"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Religion:</p><strong class="col-8 border px-2 py-1" id="religion"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Home address:</p><strong class="col-8 border px-2 py-1" id="home_address"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Mobile Phone No.:</p><strong class="col-8 border px-2 py-1" id="contact_no"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Company Name:</p><strong class="col-8 border px-2 py-1" id="company_name"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Email Address:</p><strong class="col-8 border px-2 py-1" id="email"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Company Address:</p><strong class="col-8 border px-2 py-1" id="company_address"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Position:</p><strong class="col-8 border px-2 py-1" id="position"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Sector:</p><strong class="col-8 border px-2 py-1" id="sector"></strong>
                    </div>
                    <hr class="mx-2 w-auto flex-fill">
                </div>
            </div>
            <div>
                <h2 class="mb-3">Education details</h2>
                <div class="row gap-3">
                    <div class="col-6 row">
                        <p class="col-4">Baccalaureate Degree:</p><strong class="col-8 border px-2 py-1" id="baccalaureate_degree"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Post Graduate Degree:</p><strong class="col-8 border px-2 py-1" id="post_grad_degree"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">College / University:</p><strong class="col-8 border px-2 py-1" id="baccalaureate_college"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">College / University:</p><strong class="col-8 border px-2 py-1" id="post_grad_college"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Year Graduated:</p><strong class="col-8 border px-2 py-1" id="baccalaureate_year"></strong>
                    </div>
                    <div class="col-6 row">
                        <p class="col-4">Year Graduated:</p><strong class="col-8 border px-2 py-1" id="post_grad_year"></strong>
                    </div>
                    <div class="col-12 row">
                        <p class="col-4">Fields of Specialization:</p><strong class="col-8 border px-2 py-1" id="field_of_specialization"></strong>
                    </div>
                    <hr class="mx-2 w-auto flex-fill">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#list-wrapper>.list-group').on('click', 'button', function() {
                $(this).addClass('active').siblings().removeClass('active')
                let data = $(this).data('app-data');

                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }

                // application information
                $('strong#date').text(new Date(data.date).toLocaleDateString("en-US", options))
                $('strong#new_membership').text(data.new_membership ? 'Renewed/Reinstated' : 'New')
                $('strong#chapter').text(data.chapter)
                $('strong#prc_registration_no').text(data.prc_registration_no)
                $('strong#membership').text(data.membership.charAt(0).toUpperCase() + data.membership.slice(1))
                $('strong#registration_date').text(new Date(data.registration_date).toLocaleDateString("en-US", options))
                // personal information
                $('strong#lastname').text(data.lastname)
                $('strong#firstname').text(data.firstname)
                $('strong#middlename').text(data.middlename)
                $('strong#birth_date').text(new Date(data.birth_date).toLocaleDateString("en-US", options))
                $('strong#gender').text(data.gender.charAt(0).toUpperCase() + data.gender.slice(1))
                $('strong#civil_status').text(data.civil_status.charAt(0).toUpperCase() + data.civil_status.slice(1))
                $('strong#religion').text(data.religion)
                $('strong#home_address').text(data.home_address)
                $('strong#contact_no').text(data.contact_no)
                $('strong#company_name').text(data.company_name)
                $('strong#email').text(data.email)
                $('strong#company_address').text(data.company_address)
                $('strong#position').text(data.position)
                $('strong#sector').text(data.sector)
                // educational details
                $('strong#baccalaureate_degree').text(data.baccalaureate_degree)
                $('strong#baccalaureate_college').text(data.baccalaureate_college)
                $('strong#baccalaureate_year').text(data.baccalaureate_year)
                $('strong#post_grad_degree').text(data.post_grad_degree)
                $('strong#post_grad_college').text(data.post_grad_college)
                $('strong#post_grad_year').text(data.post_grad_year)


                fetch(`${window.location.origin}/crs/application`, {
                        method: 'GET',
                        credentials: 'include',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.text())
                    .then(res => console.log(res))
                    .catch(err => console.err(err))
            })

        });
    </script>
@endsection
