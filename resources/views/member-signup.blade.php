@extends('layouts.public_layout')

@section('title', 'Members Sign up | Philippine Institute of Civil Enginerring')

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
            /* width: 556px; */
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

        #signup-form-dialog {
            width: 600px;
        }

        #signup-form-dialog>div {
            display: flex;
            flex-flow: column;
            padding: 1.25rem;
        }

        #signup-form-dialog>div>button {
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
        <h2 class="text-center mb-5">Member Sign-up</h2>
        <form method="POST" id="signup-form" class="needs-validation d-grid gap-3" action="/member-signup" novalidate>
            @csrf

            {{-- email --}}
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- password --}}
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- confirm password --}}
            <div>
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="@error('confirm_password') is-invalid @enderror" required>
                @error('confirm_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- lastname --}}
            <div>
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" class="@error('lastname') is-invalid @enderror" required>
                @error('lastname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- first name --}}
            <div>
                <label for="firstname">First name</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="@error('firstname') is-invalid @enderror" required>
                @error('firstname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- middlename --}}
            <div>
                <label for="middlename">Middle name</label>
                <input type="text" name="middlename" id="middlename" value="{{ old('middlename') }}">
                @error('middlename')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
    <script></script>
@endsection
