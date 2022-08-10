@extends('layouts.public_layout')

@section('title', 'Membership | Philippine Institute of Civil Enginerring')

@section('style')
    <style>
        .section {
            display: grid;
            grid-template-columns: 2fr 3fr;
            gap: 3.25rem;
            padding-inline: 5.25rem;
            padding-block: 3.25rem;
        }

        .section>.membership>div {
            display: flex;
            gap: .5rem
        }

        .section>.membership>div>.form-link {
            display: block;
            width: fit-content;
            height: fit-content;
            text-decoration: none;
            -webkit-appearance: none;
            color: #fff;
            background-color: #161f27;
            font-family: inherit;
            font-size: inherit;
            padding: 10px;
            padding-right: 10px;
            padding-left: 10px;
            border: none;
            border-radius: 6px;
            outline: none;
            cursor: pointer;
            transition: background-color 0.1s linear, border-color 0.1s linear, color 0.1s linear, box-shadow 0.1s linear, transform 0.1s ease;
        }

        .section>.membership>div>.form-link:hover {
            background-color: #040a0f;
        }

        .section>.membership>div>.form-link:focus {
            border-color: #0096bfab;
        }

        .section>.membership-instructions>ul {
            display: flex;
            flex-flow: column;
            gap: .75rem;
        }

        .section>.membership-instructions>ul>li>a::before {
            content: '📧';
            white-space: nowrap;
            word-break: keep-all;
            margin-right: 0.25rem;
        }

        #submission-dialog>form {
            padding: 1.25rem;
            display: flex;
            flex-flow: column;
            gap: .5rem
        }

        #submission-dialog>form>div>input {
            width: 100%;
            margin-right: 0
        }

        #submission-dialog>form>button[type=submit] {
            margin-inline: auto;
            margin-bottom: 0;
        }
    </style>
@endsection


@section('content')
    {{-- some random banner or whatnot --}}
    <div class="page-banner">
        <img src="{{ asset('images/MEMBERSHIP-1-1536x240.png') }}" alt="">
    </div>

    {{-- regular membership --}}
    <div class="section">
        <div class="membership">
            <h4>REGULAR MEMBERSHIP</h4>
            <p>A Regular Member shall be one who is duly registered in the rolls of the Professional Regulation Commission as a Civil Engineer.</p>
            <div class="">
                <a class="form-link" href="/application">Apply now</a>
                <button class="submit-dialog-button">Submit form</button>
            </div>
        </div>
        <div class="membership-instructions">
            <h4>How to Apply for a Regular Membership</h4>
            <ul>
                <li>Download the membership application form and fill up all information.</li>
                <li>Pay the corresponding membership fee of Php2,150.00 through paypal. If you do not have a credit card pay the corresponding membership fee at PICE BDO Account. Please scan the deposit slip indicating your name and email to <a href="mailto:picenatl@pice.org.ph" rel="noopener noreferrer" target="_blank">picenatl@pice.org.ph</a> together with your filled up membership registration form, copy of your PRC ID or proof of passing and a high resolution photo (preferably 2×2). Membership is valid for one (1) year. Annual renewals cost Php1,000.00.</li>
                <li>Once validated, the PICE National Headquarters will call you for your certificate of membership and ID.</li>
                <li>You may also apply for membership through the PICE Chapters in your region.</li>
            </ul>
        </div>
    </div>

    {{-- associate membership --}}
    <div class="section">
        <div class="membership">
            <h4>ASSOCIATE MEMBERSHIP</h4>
            <p>An Associate member shall be one who has acquired the degree of Bachelor of Science in Civil Engineering (BSCE) or its equivalent from any recognized engineering institution in the Philippines or abroad but who has not yet been admitted to the practice of Civil Engineering by the PRC.</p>
            <div>
                <a class="form-link" href="/application">Apply now</a>
                <button class="submit-dialog-button">Submit form</button>
            </div>
        </div>
        <div class="membership-instructions">
            <h4>How to Apply for an Associate Membership</h4>
            <ul>
                <li>Download the membership application form and fill up all information.</li>
                <li>Pay the corresponding membership fee of Php2,150.00 through PayPal. If you do not have a credit card pay the corresponding membership fee at PICE BDO Account. Please scan the deposit slip indicating your name and email to <a href="mailto:picemembership@outlook.com" rel="noopener noreferrer" target="_blank">picemembership@outlook.com</a> together with your filled up membership registration form, copy of your diploma and a high-resolution photo (preferably 2×2). Membership is valid for one (1) year. Annual renewals cost Php1,000.00.</li>
                <li>Once validated, the PICE National Headquarters will call you for your certificate of membership and ID.</li>
                <li>You may also apply for membership through the PICE Chapters in your region.</li>
            </ul>
        </div>
    </div>

    {{-- application submission dialog --}}
    <dialog id="submission-dialog">
        <header>Submit application form <button>&times;</button></header>
        <form>
            <div>
                <label for="application-id">Application ID</label>
                <input type="text" name="application_id" id="application-id">
                <div class="error-message text-danger" data-error-for="application_id"></div>
            </div>
            <div>
                <label for="application-form">Application form</label>
                <input type="file" name="application_form" id="application-form" accept="application/pdf">
                <div class="error-message text-danger" data-error-for="application_form"></div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </dialog>
@endsection


@section('script')
    <script>
        $('.submit-dialog-button').on('click', function() {
            $('dialog#submission-dialog')[0].showModal()
        })

        $('dialog#submission-dialog>header>button').on('click', function() {
            $('dialog#submission-dialog')[0].close()
        })

        $('#submission-dialog>form>input[type=file]').on('change input', function() {
            $('#submission-dialog>form>.error-message').fadeOut(function() {
                $('#submission-dialog>form>.error-message').text('')
            })
        })


        $('#submission-dialog>form').on('submit', function(e) {
            e.preventDefault();
            let body = new FormData();

            body.append('application_id', $('#submission-dialog>form input[name=application_id]').val());
            let applicationForm = $('#submission-dialog>form input[name=application_form]')[0].files[0];
            if (applicationForm !== undefined) body.append('application_form', applicationForm)

            fetch('/application/submit_form', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    body: body
                })
                .then(res => res.json())
                .then(res => {
                    console.dir(res)
                    if (res.status == 200) {
                        alert('Application submitted successfully.')
                        window.location.href = '/membership'
                    } else {
                        if (res['data']) {
                            $.each(res['data'], function(name, error_messages) {
                                error_messages.forEach(msg => {
                                    $(`#submission-dialog>form>div>div.error-message[data-error-for=${name}]`).append(
                                        `<p class="mb-0">${msg}</p>`
                                    )
                                });
                            });
                        }

                        if (res['toast']) {
                            alert(res['toast']['message'])
                        }
                    }
                })
                .catch((err) => {
                    console.error(err)
                    alert('Something happened.')
                });
        })
    </script>
@endsection
