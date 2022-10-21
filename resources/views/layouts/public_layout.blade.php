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

    {{-- public style --}}
    <link rel="stylesheet" href="{{ asset('css/public-layout.css') }}">

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
            <a href="">
                <img src="{{ asset('images/pice_logo_full_light.png') }}" alt="">
            </a>
            <ul>
                <li>
                    <a href="/" class="{{ Request::path() == '/' ? 'active' : '' }}">Home <div></div></a>
                </li>
                <li>
                    <a href="/events" class="{{ Request::is('events') ? 'active' : '' }}">Events <div></div></a>
                </li>
                <li>
                    <a href="/membership" class="{{ Request::is('membership') ? 'active' : '' }}">Membership <div></div></a>
                </li>
                <li>
                    <a href="/about-us" class="{{ Request::is('about-us') ? 'active' : '' }}">About Us <div></div></a>
                </li>
                <li>
                    <a href="/contact-us" class="{{ Request::is('contact-us') ? 'active' : '' }}">Contact Us <div></div></a>
                </li>
                <li>
                    <a href="/privacy-statement" class="{{ Request::is('privacy-statement') ? 'active' : '' }}">Privacy Statement <div></div></a>
                </li>
            </ul>

            <div>
                @if (auth('member')->check())
                    <div class="account-menu-block">
                        <button type="button" class="account-menu-dropdown-button">
                            @if (auth('member')->user()->photo)
                                <img src="{{ asset('/storage/photos/' . auth('member')->user()->photo) }}" alt="{{ auth('member')->user()->photo }}">
                            @else
                                <img src="{{ asset('/images/profile-logo.png') }}" alt="">
                            @endif
                        </button>
                        <div class="d-none account-menu-dropdown">
                            <div class="profile-preview">
                                @if (auth('member')->user()->photo)
                                    <img src="{{ asset('/storage/photos/' . auth('member')->user()->photo) }}" alt="{{ auth('member')->user()->photo }}">
                                @else
                                    <img src="{{ asset('/images/profile-logo.png') }}" alt="">
                                @endif
                                <div>
                                    {{ auth('member')->user()->lastname }}, {{ auth('member')->user()->firstname }} {{ auth('member')->user()->middlname ? auth('member')->user()->middlename[0] : '' }}
                                </div>
                                <span>role</span>
                            </div>
                            <hr>
                            <a href="/member/profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-text-window-reverse" viewBox="0 0 16 16">
                                    <path d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                                    <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z" />
                                </svg>
                                <span>My profile</span>
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
                            <a href="/member/logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                                    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                                </svg>
                                <span>Sign out</span>
                            </a>
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

    {{-- footer --}}
    <footer>
        {{-- left --}}
        <div class="left">
            <div class="branding">
                <img src="{{ asset('images/pice_logo_full_light.png') }}" alt="">
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse earum optio cum commodi aliquam possimus temporibus ducimus quas impedit laborum!
            </p>

            {{-- social media links --}}
            <div class="socials">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- right --}}
        <div class="right">
            <div class="affiliates">
                <img src="{{ asset('images/affiliates.png') }}" alt="">
            </div>
        </div>
        {{-- all rights reserve --}}
        <div class="reserves">
            <hr>
            <p class="tracking-normal lg:mb-2"> © {{ date('Y') }} PICE Inc. All rights reserved.</p>
        </div>
    </footer>


    {{-- signin dialog --}}
    @if (!auth('member')->check())
        <dialog id="signin-dialog">
            <header>Sign in to PICE <button>&times;</button></header>
            <form method="POST" action="/member/authenticate">
                @csrf
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Sign in</button>
                <div class="member-signup-link-wrapper">
                    <a href="/member-signup">Sign up here</a>
                </div>
            </form>
        </dialog>
    @endif


    {{-- set `false` on development, change to `true` on production --}}
    @if (false)
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
