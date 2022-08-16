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
    </style>
@endsection


@section('content')
    {{-- top nav bar --}}
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Membership Fees</span>
        </div>
    </nav>

    <div id="content">

        {{-- table wrapper --}}
        <div class="table-wrapper">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr class="shadow-sm">
                        <th scope="col">Name</th>
                        <th scope="col">Membership status</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date paid</th>
                        <th scope="col">Paid</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach ($applications as $application)
                        <tr data-application-id="{{ $application->id }}">
                            <td>
                                {{ $application->lastname }}, {{ $application->firstname }} {{ $application->middlename ? Str::substr($application->middlename, 0, 1) : '' }}
                            </td>
                            <td>
                                {{ Str::ucfirst($application->membership_status) }}
                            </td>
                            <td>
                                P {{ $application->membership_fee }}
                            </td>
                            <td>
                                {{ $application->date_paid ? date('d/M/y', strtotime($data->created_at)) : 'Not paid' }}
                            </td>
                            <td>
                                @if ($application->date_paid)
                                    <button class="btn btn-primary btn-sm disabled" disabled>Paid</button>
                                @else
                                    <button class="btn btn-primary btn-sm" data-application-id="{{ $application->id }}" data-bs-toggle="modal" data-bs-target="#confirm-paid-modal">Paid</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- confirm paid modal --}}
    <div class="modal fade" id="confirm-paid-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Confirm updating application as paid?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="confirm btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        // enable tooltips
        let tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-has-tooltip="true"]')
        );
        let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        let toast = new bootstrap.Toast(document.querySelector('#toast-wrapper>.toast'))



        let confirmPaidModalElem = document.getElementById('confirm-paid-modal')
        let confirmPaidModal = new bootstrap.Modal(confirmPaidModalElem)
        confirmPaidModalElem.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let applicationID = button.getAttribute('data-application-id')
            $(confirmPaidModalElem).find('button.confirm').attr('data-application-id', applicationID)
        })

        $(confirmPaidModalElem).find('button.confirm').on('click', function(e) {
            let spinner = $(this).find('span')
            spinner.removeClass('d-none');
            let applicationID = $(this).attr('data-application-id')

            fetch(`/administration/membership_fees/paid/${applicationID}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(res => res.json())
                .then(res => {
                    if (res.status == 200) {
                        $(`table tbody tr[data-application-id=${applicationID}]`).remove()
                    }

                    $('#toast-wrapper>.toast').find('.toast-header>strong').text('Application')
                    $('#toast-wrapper>.toast').find('.toast-body').text(res['toast']['message'])

                    confirmPaidModal.hide()
                    toast.show()
                })
                .catch((err) => {
                    console.error(err)
                    alert('Something happened.')
                })

            spinner.addClass('d-none')

        })
    </script>

@endsection
