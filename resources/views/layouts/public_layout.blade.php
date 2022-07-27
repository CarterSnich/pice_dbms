<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

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
    </style>

    @yield('style')
</head>

<body>
    {{-- header styling --}}
    <style>
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
            margin-inline: auto 1.25rem;
            margin-block: auto;
        }

        nav>div>button {
            margin: 0;
        }
    </style>
    {{-- header --}}
    <header>
        <nav>
            <a href="">
                <img src="{{ asset('images/pice_logo_full.png') }}" alt="">
            </a>
            <ul>
                <li>
                    <a href="/" class="{{ Request::path() == '/' ? 'active' : '' }}">Home <div></div></a>
                </li>
                <li>
                    <a href="/about-us" class="{{ Request::is('about-us') ? 'active' : '' }}">About Us <div></div></a>
                </li>
                <li>
                    <a href="/events" class="{{ Request::is('events') ? 'active' : '' }}">Events <div></div></a>
                </li>
                <li>
                    <a href="/membership" class="{{ Request::is('membership') ? 'active' : '' }}">Membership <div></div></a>
                </li>
                <li>
                    <a href="/contact-us" class="{{ Request::is('contact-us') ? 'active' : '' }}">Contact Us <div></div></a>
                </li>
                <li>
                    <a href="/privacy-statement" class="{{ Request::is('privacy-statement') ? 'active' : '' }}">Privacy Statement <div></div></a>
                </li>
            </ul>

            <div>
                <button id="signin-dialog-button">Sign in</button>
            </div>
        </nav>
    </header>

    {{-- main --}}
    <main>
        @yield('content')
    </main>

    {{-- footer styling --}}
    <style>
        footer {
            padding-inline: 5rem;
            padding-block: 3rem 1.25rem;
            display: grid;
            grid-template-columns: 2fr 3fr;
            grid-column-gap: 1rem
        }

        footer>div.left {
            display: flex;
            flex-flow: column;
        }

        footer>div.left>div.branding {
            margin-bottom: 2.25rem;
        }

        footer>div.left>p {
            margin-bottom: auto
        }

        footer>div.left>div.socials>a {
            display: block;
            color: whitesmoke;
        }

        footer>div.left>div.socials {
            display: flex;
            flex-flow: row;
            gap: 3.25rem;
            justify-content: start;
            margin: 1.25rem
        }

        footer>div.left>div.socials>a>svg {
            height: 32px;
            aspect-ratio: 1;
        }

        footer>div.right {
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            gap: 3rem;
        }


        footer>div.reserves {
            grid-column: 1/3;
            align-items: center;
            text-align: center
        }
    </style>
    {{-- footer --}}
    <footer>
        <div class="left">
            <div class="branding">
                <img src="{{ asset('images/pice_logo_full.png') }}" alt="">
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse earum optio cum commodi aliquam possimus temporibus ducimus quas impedit laborum!
            </p>

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

        <div class="right">
            <div class="affiliates">
                <img src="{{ asset('images/affiliates.png') }}" alt="">
            </div>

        </div>

        <div class="reserves">
            <hr>
            <p class="tracking-normal lg:mb-2"> © 2022 PICE Inc. All rights reserved.</p>
        </div>

    </footer>


    <style>
        #signin-dialog {
            padding: 0;
        }

        #signin-dialog>header {
            margin: unset
        }

        #signin-dialog>header>button {
            padding: 0;
            background-color: transparent;
            font-size: x-large;
            margin: 0;
            line-height: 1;
            height: auto;
            width: auto;
            position: absolute;
            right: 1.25rem;
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        #signin-dialog>header>button:hover {
            opacity: 1;
        }

        #signin-dialog>form {
            padding: 1.25rem;
            display: flex;
            flex-flow: column;
            gap: .5rem
        }

        #signin-dialog>form input,
        #signin-dialog>form button {
            margin-right: unset;
        }
    </style>
    {{-- signin dialog --}}
    <dialog id="signin-dialog">
        <header style="">Sign in to PICE <button>&times;</button></header>
        <form method="POST" action="/user/authenticate">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Sign in</button>
        </form>
    </dialog>

    {{-- compiled script --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- page script --}}
    <script>
        $(function() {
            // header links
            $('nav>ul>li').hover(
                function() {
                    $(this).addClass('.hover');
                },
                function() {
                    $(this).removeClass('.hover');
                }
            );

            $('#signin-dialog-button').on('click', function() {
                document.getElementById('signin-dialog').showModal()
            })

            $('#signin-dialog>header>button').on('click', function() {
                document.getElementById('signin-dialog').close()
            })
        });
    </script>

    {{-- per page script --}}
    @yield('script')
</body>

</html>
