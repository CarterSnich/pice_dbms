@extends('layouts.public_layout')

@section('title', 'Featured Events and News | Philippine Institute of Civil Enginerring')

@section('style')
    <style>
        .section {
            display: grid;
            grid-template-columns: 2fr 4fr;
            padding: 5.25rem 3.25rem;
        }

        .card-wrapper .card {
            min-height: 186px;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            outline: none;
        }

        .card-wrapper .card img {
            display: block;
            width: 100%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: filter 0.3s ease;
        }

        .card-wrapper .card h4 {
            display: none;
            color: whitesmoke;
            transition: display 0.3s ease;
            z-index: 1;
        }

        .card-wrapper .card-cover {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            transition: filter 0.3s;
        }

        .card-wrapper .card:hover img {
            filter: brightness(50%);
        }

        .card-wrapper .card:hover h4 {
            display: unset;
        }
    </style>
@endsection

@section('content')
    {{-- some random banner or whatnot --}}
    <div class="page-banner">
        <img src="{{ asset('images/EVENTS-1536x240.png') }}" alt="">
    </div>

    {{-- featured events --}}
    <div id="featured-events" class="section">
        <div>
            <h1>
                FEATURED<br>EVENTS
            </h1>
        </div>

        <div class="card-wrapper">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col d-flex justify-content-center align-items-center">
                    <a href="/events/all">
                        <h2>More...</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- featured news --}}
    <div id="featured-news" class="section">
        <div>
            <h1>
                FEATURED<br>NEWS
            </h1>
        </div>

        <div class="card-wrapper">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col">
                    <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/">
                        <img src="{{ asset('images/event.png') }}" alt="">
                        <h4 class="my-auto text-center">Lorem Ipsum</h4>
                    </a>
                </div>

                <div class="col d-flex justify-content-center align-items-center">
                    <a href="/events/all">
                        <h2>More...</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
