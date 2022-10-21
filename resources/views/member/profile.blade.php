@extends('layouts.public_layout')

@section('style')
    <style>
        main {
            border: 1px solid red;
            padding: 5.25rem;
        }

        .profile-wrapper {
            border: 1px solid red;
            padding: 3.25rem 5.25rem;
        }
    </style>
@section('content')

    @dd($member)

    <h2>Member profile</h2>

    <div class="profile-wrapper">

        <div>
            <label for=""></label>
            <p></p>
        </div>

    </div>


@endsection
