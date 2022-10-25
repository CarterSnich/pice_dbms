<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Administration') | Philippine Institute of Civil Engineering, Inc. Metro-Tacloban Chapter</title>

    {{-- app.css --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <style>
        html {
            height: -webkit-fill-available;
        }

        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
            display: flex;
        }

        *::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        *::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        *::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }


        main {
            flex-grow: 1;
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow: hidden;
            display: block;
        }

        .b-example-divider {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .bi {
            vertical-align: -.125em;
            pointer-events: none;
            fill: currentColor;
        }

        .dropdown-toggle {
            outline: 0;
        }

        .nav-flush .nav-link {
            border-radius: 0;
        }

        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            color: rgba(0, 0, 0, .65);
            background-color: transparent;
            border: 0;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
        }

        .btn-toggle[data-bs-toggle=collapse]::after {
            width: 1.25em;
            line-height: 0;
            content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
            transition: transform .35s ease;
            transform-origin: .5em 50%;
            margin-left: auto
        }

        .btn-toggle[aria-expanded=true] {
            color: rgba(0, 0, 0, .85);
        }

        .btn-toggle[aria-expanded=true]::after {
            transform: rotate(90deg);
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
            margin-top: .125rem;
            margin-left: 1.25rem;
            text-decoration: none;
        }

        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #d2f4ea;
        }

        .scrollarea {
            overflow-y: auto;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .lh-tight {
            line-height: 1.25;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        #toast-wrapper {
            position: fixed;
            bottom: 2.25rem;
            right: 2.25rem;
        }
    </style>

    @yield('style')

</head>

<body>

    <nav class="d-flex flex-column flex-shrink-0 p-3 bg-white" style="width: 280px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <img src="{{ asset('images/pice_logo_full.png') }}" alt="banner-full" class="img-fluid">
        </a>
        <ul class="list-unstyled ps-0">

            {{-- members --}}
            @if (in_array(auth()->user()->role, ['super_admin', 'president', 'secretary']))
                <li class="mb-1">
                    <button class="btn btn-toggle w-100 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#members-collapse" aria-expanded="{{ request()->is('administration/members') ? 'true' : 'false' }}">
                        Members
                    </button>
                    <div class="collapse {{ request()->is('administration/members') ? 'show' : '' }}" id="members-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a href="/administration/members?membership=all" class="link-dark rounded {{ request()->get('membership') == 'all' ? 'bg-info' : '' }}">
                                    All
                                </a>
                            </li>

                            @foreach (App\Models\Application::MEMBERSHIP_TYPES as $type)
                                <li>
                                    <a href="/administration/members?membership={{ $type }}" class="link-dark rounded {{ request()->get('membership') == $type ? 'bg-info' : '' }}">
                                        {{ ucfirst($type) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif

            {{-- applications --}}
            @if (in_array(auth()->user()->role, ['super_admin', 'president', 'secretary']))
                <li class="mb-1">
                    <button class="btn btn-toggle w-100 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#applications-collapse" aria-expanded="{{ request()->is('administration/applications') ? 'true' : 'false' }}">
                        Applications
                    </button>
                    <div class="collapse {{ request()->is('administration/applications') ? 'show' : '' }}" id="applications-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a href="/administration/applications?status=pending" class="link-dark rounded {{ request()->get('status') == 'pending' ? 'bg-info' : '' }}">
                                    Pending
                                </a>
                            </li>
                            <li>
                                <a href="/administration/applications?status=not_approved" class="link-dark rounded {{ request()->get('status') == 'not_approved' ? 'bg-info' : '' }}">
                                    Not Approved
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            {{-- membership fees --}}
            @if (in_array(auth()->user()->role, ['super_admin', 'president', 'treasurer']))
                <li class="mb-1">
                    <a href="/administration/membership_fees" class="btn w-100 btn-toggle align-items-center rounded {{ request()->is('administration/membership_fees') ? 'bg-info' : '' }}">
                        Membership fees
                    </a>
                </li>
            @endif

            {{-- events --}}
            @if (in_array(auth()->user()->role, ['super_admin', 'president', 'information_officer']))
                <li class="mb-1">
                    <a href="/administration/events" class="btn btn-toggle w-100 align-items-center rounded {{ request()->is('administration/events') ? 'bg-info' : '' }}">
                        Events
                    </a>
                </li>
            @endif
        </ul>

        <hr class="mt-auto">

        {{-- user account dropdown menu --}}
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle mx-2" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <div class="flex-fill d-flex flex-column">
                    <strong class="text-truncate">
                        {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}
                    </strong>
                    <small>{{ App\Models\Member::ROLES[auth()->user()->role] }}</small>
                </div>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form id="admin-logout-form" action="/administration/logout" method="POST">
                        @csrf
                    </form>
                    <button type="submit" class="dropdown-item text-danger" form="admin-logout-form">Log out</button>
                </li>
            </ul>
        </div>
    </nav>


    {{-- main --}}
    <main>
        @yield('content')
    </main>


    <div id="toast-wrapper">

        {{-- toast template --}}
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body"></div>
        </div>

    </div>


    {{-- compiled script --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- per page script --}}
    @yield('script')
</body>

</html>
