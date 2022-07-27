<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    {{-- app.css --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <style>
        /* Navbar */
        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar-brand>img {
            width: 80%;
            margin-inline: auto
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }
    </style>

    @yield('style')
</head>

<body>
    {{-- header --}}
    <header class="navbar navbar-dark bg-dark sticky-top flex-md-nowrap text-light p-0 shadow">
        {{-- branding --}}
        <a class="navbar-brand col-md-3 col-lg-2 me-0 p-0 d-flex bg-white" href="#">
            <img src="{{ asset('images/pice_logo_full.png') }}">
        </a>
        {{-- page tabs --}}
        <ul class="nav nav-pills">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('administration/members') ? 'active' : '' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Members</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/administration/members?m=regular">Regular</a></li>
                    <li><a class="dropdown-item" href="/administration/members?m=associate">Associate</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('administration/applications') ? 'active' : '' }}" href="/administration/applications">Applications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('administration/events') ? 'active' : '' }}" href="/administration/events">Events</a>
            </li>
        </ul>
        {{-- username ang logout button --}}
        <div class="navbar-nav">
            <form class="d-flex flex-row nav-item text-nowrap" method="POST" action="/administration/logout">
                @csrf
                <div class="mx-3 my-auto text-light d-flex align-items-center">
                    <span class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </span>
                    {{ auth()->user()->name }}
                </div>
                <div class="vr"></div>
                <button type="submit" class="nav-link px-3 bg-transparent border-0">Log out</button>
            </form>
        </div>
    </header>


    {{-- main --}}
    <main class="p-3">
        @yield('content')
    </main>

    {{-- compiled script --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- per page script --}}
    @yield('script')
</body>

</html>
