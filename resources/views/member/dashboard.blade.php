<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- app.css --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    {{-- water.css --}}
    <link rel="stylesheet" href="{{ asset('/css/water-dark.css') }}">

    <style>
        body {
            font-family: Poppins;
            margin: 0;
            max-width: unset;
            box-sizing: border-box;
            padding: unset;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #1c76c5;
        }

        /* vanta.js wrapper */
        #vanta-bg {
            position: fixed;
            height: 100vh;
            width: 100vw;
            background-color: whitesmoke;
            z-index: 0;
        }

        /* header */
        header {
            position: sticky;
            top: 0;
            z-index: 1010;
            background-color: inherit;
        }

        nav {
            display: flex;
        }

        nav>a {
            margin-inline: 1.25rem;
        }

        nav>a>img {
            max-height: 64px;
            width: auto;
        }

        nav>ul {
            list-style: none;
            display: flex;
            gap: 3.25rem;
            margin-block: auto;
            margin-inline: 2.25rem;
        }

        nav>ul>li>a {
            display: block;
            opacity: 0.6;
            color: whitesmoke;
            transition: opacity .3s;
            position: relative;
        }

        nav>ul>li>a>div {
            opacity: 0;
            height: 4px;
            width: 100%;
            bottom: -0.5rem;
            background-color: #328af1;
            position: absolute;
            border-radius: .934rem;
            pointer-events: none;
            position: absolute;
            transition: opacity .3s;
        }

        nav>ul>li>a:hover,
        nav>ul>li>a.active {
            opacity: 1;
            color: whitesmoke;
            text-decoration: none;
        }

        nav>ul>li>a:hover>div,
        nav>ul>li>a.active>div {
            opacity: 1;
        }

        nav>div {
            font-size: smaller;
            margin-inline: auto 0.25rem;
            margin-block: auto;
        }

        nav>div>button {
            margin: 0;
        }

        /* main */
        main {
            color: black;
            position: relative;
        }

        #popup-alert-wrapper {
            width: 512px;
            z-index: 1011;
            position: fixed;
            top: 1.25rem;
            left: 50%;
            transform: translateX(-50%)
        }

        #popup-alert-wrapper .alert.alert-dismissible .btn-close:hover {
            color: #000;
            text-decoration: none;
            opacity: 0.75;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
        }

        .account-menu-block {
            position: relative;
            color: black;
        }

        .account-menu-block>button {
            display: contents;
        }

        .account-menu-block>button>div {
            padding: 10px;
            border: none;
            border-radius: 6px;
            transition: background-color ease 0.1s
        }

        .account-menu-block>button.collapsed>div {
            background-color: #161f27;
        }

        .account-menu-block>button:hover>div {
            background-color: #161f27;
        }

        .account-menu-block>button>div>span {
            margin-left: 0.25rem
        }

        .account-menu-block>button>div>img {
            height: 32px;
            width: 32px;
            background-color: white;
            border-radius: 50%
        }


        .account-menu-block>.account-menu-dropdown {
            position: absolute;
            top: calc(100% + 0.75rem);
            right: .75rem;
            width: 200px;
            background-color: whitesmoke;
            border-radius: 6px;
            background-color: #F5F5F5;
            box-shadow: 1px 1px 4px #000;
            display: flex;
            flex-flow: column;
            align-items: center;
            outline: none
        }

        .account-menu-block>.account-menu-dropdown>a,
        .account-menu-block>.account-menu-dropdown>button {
            width: 100%;
            height: 100%;
            text-decoration: none;
        }

        .account-menu-block>.account-menu-dropdown>button {
            background-color: unset;
            color: #41adff;
            padding: unset;
            margin: unset;
            border-radius: unset;
            text-align: start;
            color: #41adff;
        }

        .account-menu-block>.account-menu-dropdown>button:active {
            position: static !important;
            transform: none !important;
            border: none
        }

        .account-menu-block>.account-menu-dropdown>a:active,
        .account-menu-block>.account-menu-dropdown>button:active {
            box-shadow: 0 0 0 2px #0096bfab;
        }

        .account-menu-block>.account-menu-dropdown>a:hover,
        .account-menu-block>.account-menu-dropdown>button:hover {
            background-color: #00000050;
            color: whitesmoke
        }

        .account-menu-block>.account-menu-dropdown>a>*,
        .account-menu-block>.account-menu-dropdown>button>* {
            margin: 0.75rem;
        }

        .account-menu-block>.account-menu-dropdown>a>span,
        .account-menu-block>.account-menu-dropdown>button>span {
            margin: 0
        }

        .account-menu-block>.account-menu-dropdown>hr {
            width: 100%;
            background-color: #526980;
            margin: 0;
        }

        .account-menu-block>.account-menu-dropdown>.profile-preview {
            display: flex;
            flex-flow: column;
            align-items: center;
            gap: .25rem;
            padding: 0.75rem;
        }

        .account-menu-block>.account-menu-dropdown>.profile-preview>img {
            height: 64px;
            width: 64px;
            border-radius: 50%;
            background-color: whitesmoke;
            border: 1px solid #526980;
        }
    </style>

    @yield('style')
</head>

<body>
    {{-- vanta.js wrapper --}}
    <div id="vanta-bg"></div>

    {{-- toast alerts --}}
    <div id="popup-alert-wrapper">
        @if (session()->has('toast'))
            <div class="alert alert-{{ session()->get('toast')['type'] }} alert-dismissible fade show shadow" role="alert">
                {{ session()->get('toast')['message'] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>


    {{-- header --}}
    <header>
        <nav>
            <a href="/">
                <img src="{{ asset('images/pice_logo_full_light.png') }}" alt="">
            </a>
            <ul>
                <li>
                    <a href="member/dashboard" class="{{ Request::is('member/dashboard') ? 'active' : '' }}">Dashboard <div></div></a>
                </li>
                <li>
                    <a href="member/event" class="{{ Request::is('member/event') ? 'active' : '' }}">Events <div></div></a>
                </li>
                <li>
                    <a href="member/projects" class="{{ Request::is('member/projects') ? 'active' : '' }}">Projects <div></div></a>
                </li>
            </ul>

            <div>
                @if (auth('member')->check())
                    <div class="account-menu-block">
                        <button type="button" class="account-menu-dropdown-button">
                            <div>
                                <img src="{{ asset('/storage/photos/' . auth('member')->user()->photo) }}" alt="">
                                <span>{{ auth()->user()->membership_id }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </div>
                        </button>
                        <div class="d-none account-menu-dropdown">
                            <div class="profile-preview">
                                <img src="{{ asset('/storage/photos/' . auth('member')->user()->photo) }}" alt="">
                                <div>
                                    {{ auth('member')->user()->lastname }}, {{ auth('member')->user()->firstname }} {{ auth('member')->user()->middlname ? auth('member')->user()->middlename[0] : '' }}
                                </div>
                                <a href="#">My profile</a>
                            </div>
                            <hr>
                            <a href="/member/dashboard">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-text-window-reverse" viewBox="0 0 16 16">
                                    <path d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                                    <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                            <hr>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path
                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg>
                                <span>Account setting</span>
                            </a>
                            <hr>
                            <form action="/member/logout" id="account-menu-logout-form" method="POST"> @csrf </form>
                            <button type="submit" form="account-menu-logout-form">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </div>
                    </div>
                @else
                    <button id="signin-dialog-button">Sign in</button>
                @endif
            </div>
        </nav>
    </header>

    {{-- main --}}
    <main>
        @yield('content')
    </main>



    {{-- signin dialog --}}
    @if (!auth('member')->check())
        <dialog id="signin-dialog">
            <header style="">Sign in to PICE <button>&times;</button></header>
            <form method="POST" action="/member/authenticate">
                @csrf
                <div>
                    <label for="membership_id">Membership ID</label>
                    <input type="text" id="membership_id" name="membership_id" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Sign in</button>
            </form>
        </dialog>
    @endif


    {{-- set `false` on development, change to `true` on production --}}
    @if (env('APP_DEBUG') == false)
        {{-- vantajs --}}
        <script src="{{ asset('js/three.min.js') }}"></script>
        <script src="{{ asset('js/vanta.globe.min.js') }}"></script>
        <script>
            VANTA.GLOBE({
                el: "#vanta-bg",
                mouseControls: false,
                touchControls: false,
                gyroControls: false,
                minHeight: 200.00,
                minWidth: 200.00,
                scale: 1.00,
                scaleMobile: 1.00,
                color: 0x11abf0,
                backgroundColor: 0xffffff
            })
        </script>
    @endif

    {{-- compiled script --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- page script --}}
    <script>
        $('#popup-alert-wrapper').on('closed.bs.alert', '.alert', function() {
            $(this).children().remove()
        })

        // show sign in dialog on sign in button click
        $('#signin-dialog-button').on('click', function() {
            document.getElementById('signin-dialog').showModal()
        })

        // close sign in dialog
        $('#signin-dialog>header>button').on('click', function() {
            document.getElementById('signin-dialog').close()
        })

        $('.account-menu-dropdown-button').on('click', function() {
            $('.account-menu-dropdown').toggleClass('d-none')
        })

        setTimeout(() => {
            $('#popup-alert-wrapper .alert').fadeOut(function() {
                $(this).remove()
            })
        }, 10000);
    </script>

    {{-- per page script --}}
    @yield('script')
</body>

</html>
