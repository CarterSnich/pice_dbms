@extends('layouts.administration_layout')

{{-- title --}}
@section('title', 'Events | PICE Administration')

{{-- page style --}}
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

        img[data-application=photo] {
            min-height: 200px;
            min-width: 200px;
            height: 200px;
            width: 200px;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    {{-- top nav bar --}}
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Events</span>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post-event-modal">Post event</button>
        </div>
    </nav>

    <div id="content">

        {{-- table wrapper --}}
        <div class="table-wrapper">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr class="shadow-sm">
                        <th scope="col" class="visually-hidden">#</th>
                        <th scope="col">Event title</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Organizer</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach ($events as $event)
                        <tr data-event-id="{{ $event['id'] }}">
                            <th scope="row" class="visually-hidden">{{ $loop->iteration }}</th>
                            <td>
                                <a href="#" class="text-decoration-none" data-event-id="{{ $event->id }}">{{ $event->title }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-event-id="{{ $event->id }}">{{ $event->start_date }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-event-id="{{ $event->id }}">{{ $event->end_date }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-decoration-none" data-event-id="{{ $event->id }}">{{ $event->organizer }}</a>
                            </td>
                            <td>
                                <div>
                                    <button class="approve-application-button btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#confirm-approval-modal" data-application-id="{{ $event->id }}" data-has-tooltip="true" data-bs-placement="top" title="View">
                                        View
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- post event modal --}}
    <div class="modal fade" id="post-event-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="post-event-form">
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="title" id="title">
                            <div class="error-message text-danger" data-error-for="title"></div>
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="col-form-label">Picture:</label>
                            <div class="d-none"><img src="" class="img-thumbnail"></div>
                            <input type="file" class="form-control" name="picture" accept="image/*">
                            <div class="error-message text-danger" data-error-for="picture"></div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                            <div class="error-message text-danger" data-error-for="description"></div>
                        </div>
                        <div class="mb-3">
                            <label for="start-date" class="col-form-label">Start date:</label>
                            <input type="date" class="form-control" name="start_date" id="start-date">
                            <div class="error-message text-danger" data-error-for="start_date"></div>
                        </div>
                        <div class="mb-3">
                            <label for="end-date" class="col-form-label">End date:</label>
                            <input type="date" class="form-control" name="end_date" id="end-date">
                            <div class="error-message text-danger" data-error-for="end_date"></div>
                        </div>
                        <div class="mb-3">
                            <label for="cost" class="col-form-label">Cost:</label>
                            <input type="number" class="form-control" name="cost" id="cost">
                            <div class="error-message text-danger" data-error-for="cost"></div>
                        </div>
                        <div class="mb-3">
                            <label for="organizer" class="col-form-label">Organizer:</label>
                            <input type="text" class="form-control" name="organizer" id="organizer">
                            <div class="error-message text-danger" data-error-for="organizer"></div>
                        </div>
                        <div class="mb-3">
                            <label for="contact-no" class="col-form-label">Contact No.:</label>
                            <input type="text" class="form-control" name="contact_no" id="contact-no">
                            <div class="error-message text-danger" data-error-for="contact_no"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="emai" class="form-control" name="email" id="email">
                            <div class="error-message text-danger" data-error-for="email"></div>
                        </div>
                        <div class="mb-3">
                            <label for="website" class="col-form-label">Website:</label>
                            <input type="text" class="form-control" name="website" value="https://" id="website">
                            <div class="error-message text-danger" data-error-for="website"></div>
                        </div>
                        <div class="mb-3">
                            <label for="venue" class="col-form-label">Venue:</label>
                            <input type="text" class="form-control" name="venue" id="venue">
                            <div class="error-message text-danger" data-error-for="venue"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="post-event-form">Post</button>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- page script --}}
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

        let postEventModalElem = document.getElementById('post-event-modal')
        let postEventModal = new bootstrap.Modal(postEventModalElem)
        postEventModalElem.addEventListener('hidden.bs.modal', function(e) {
            $('#post-event-form').trigger('reset')
            $('#post-event-form div>img').parent().addClass('d-none')
        })


        $('table tbody>tr>td>a').on('click', function() {
            // let applicationId = $(this).attr('data-application-id')
            // let body = new FormData()
            // body.append('application_id', applicationId)

            // fetch('/administration/applications/get_application', {
            //         method: 'POST',
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         body: body
            //     })
            //     .then((res) => res.json())
            //     .then((res) => {
            //         let application = res['application']
            //         console.dir(application)

            //         // application details
            //         $(`[data-application=date]`).text(moment(application['date']).format('LL'))
            //         $(`[data-application=application_id]`).text(application['application_id'])
            //         $(`[data-application=membership_status]`).text(ucfirst(application['membership_status']))
            //         $(`[data-application=chapter]`).text(application['chapter'])
            //         $(`[data-application=year_chap_no_natl_no]`).text(application['year_chap_no_natl_no'])
            //         $(`[data-application=photo]`).attr('src', `/storage/photos/${application['photo']}`)
            //         $(`[data-application=membership]`).text(ucfirst(application['membership']))
            //         $(`[data-application=prc_registration_no]`).text(application['prc_registration_no'])
            //         $(`[data-application=registration_date]`).text(moment(application['registration_date']).format('LL'))

            //         // applicant information
            //         $(`[data-application=lastname]`).text(application['lastname'])
            //         $(`[data-application=firstname]`).text(application['firstname'])
            //         $(`[data-application=middlename]`).text(application['middlename'])
            //         $(`[data-application=date_of_birth]`).text(moment(application['date_of_birth']).format('LL'))
            //         $(`[data-application=place_of_birth]`).text(application['place_of_birth'])
            //         $(`[data-application=gender]`).text(ucfirst(application['gender']))
            //         $(`[data-application=civil_status]`).text(application['civil_status'])
            //         $(`[data-application=religion]`).text(application['religion'])
            //         $(`[data-application=home_address]`).text(application['home_address'])
            //         $(`[data-application=office_tel_no]`).text(application['office_tel_no'])
            //         $(`[data-application=mobile_phone_no]`).text(application['  mobile_phone_no'])
            //         $(`[data-application=company_name]`).text(application['company_name'])
            //         $(`[data-application=email]`).text(application['email'])
            //         $(`[data-application=company_address]`).text(application['company_address'])
            //         $(`[data-application=position]`).text(application['position'])
            //         $(`[data-application=sector]`).text(application['sector'])

            //         // educational details
            //         $(`[data-application=baccalaureate_degree]`).text(application['baccalaureate_degree'])
            //         $(`[data-application=baccalaureate_college]`).text(application['baccalaureate_college'])
            //         $(`[data-application=baccalaureate_year]`).text(application['baccalaureate_year'])
            //         $(`[data-application=post_graduate_degree]`).text(application['post_graduate_degree'])
            //         $(`[data-application=post_graduate_college]`).text(application['post_graduate_college'])
            //         $(`[data-application=post_graduate_year]`).text(application['post_graduate_year'])
            //         $(`[data-application=fields_of_specialization]`).text(application['fields_of_specialization'])

            //         viewApplicationModal.show()
            //     })
            //     .catch((err) => {
            //         console.error(err)
            //         alert('Failed to fetch application data.')
            //     });


        })

        $('#post-event-form :input').on('change input', function() {
            let errorMessageDiv = $(this).siblings('div.error-message');
            errorMessageDiv.fadeOut(function() {
                errorMessageDiv.empty()
            })
        })

        $('#post-event-form input[name=picture]').on('change input', function() {
            $(this).siblings('div').removeClass('d-none').children('img').attr('src', URL.createObjectURL(this.files[0]))
        })

        $('#post-event-form').on('submit', function(event) {
            event.preventDefault();
            let body = new FormData();

            $('#post-event-form :input').serializeArray().forEach(input => {
                body.append(input['name'], input['value'])
            });

            let pictureFile = $('#post-event-form input[type=file]')[0].files[0]
            body.append('picture', pictureFile)

            fetch('/administration/events', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: body
                })
                .then(res => res.json())
                .then(res => {
                    console.dir(res)
                    if (res.status == 200) {
                        postEventModal.hide()
                        window.location.reload()
                    } else {
                        $.each(res['data'], function(name, error_messages) {
                            error_messages.forEach(msg => {
                                $(`div.error-message[data-error-for=${name}]`).empty().append(
                                    `<p class="mb-0">${msg}</p>`
                                )
                            });
                            $('div.error-message').show()
                        });
                    }
                })
                .catch((err) => {
                    console.error(err)
                    alert('Something happened.')
                });


        })
    </script>
@endsection
