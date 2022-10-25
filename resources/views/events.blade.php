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
            transition: transform 0.3s ease;
        }

        .card-wrapper .card img {
            display: block;
            width: 100%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            filter: brightness(60%);
        }

        .card-wrapper .card .event-details {
            height: 100%;
            display: flex;
            flex-flow: column;
            justify-content: end;
            color: white;
            gap: .5rem;
            z-index: 1;
        }

        .card-wrapper .card .event-details h4 {
            color: inherit;
            margin: 0;
            text-shadow: 2px 2px 4px #00000050
        }


        .card-wrapper .row .col {
            position: relative;
        }

        .card-wrapper .row .col:hover .card {
            width: 100%;
            height: 100%;
            position: absolute;
            transform: scale(110%);
            z-index: 10;
        }
    </style>
@endsection

@section('content')
    {{-- some random banner or whatnot --}}
    <div class="page-banner">
        <img src="{{ asset('images/events.png') }}" alt="">
    </div>

    {{-- featured events --}}
    <div id="featured-events" class="section">
        <div>
            <h1>
                FEATURED<br>EVENTS
            </h1>
        </div>

        @if ($events->count())

            <div class="card-wrapper">
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    @foreach ($events as $event)
                        <div class="col">
                            <a class="card bg-dark h-100 border-0 p-3 card-cover" href="/events/{{ $event->id }}">
                                <img class="h-100" src="{{ asset("storage/event-pictures/{$event->picture}") }}" alt="">
                                <div class="event-details">
                                    <h4>{{ $event->title }}</h4>
                                    @php
                                        $start_date = \Carbon\Carbon::create($event->start_date);
                                        $end_date = \Carbon\Carbon::create($event->end_date);
                                        
                                        if ($start_date->equalTo($end_date)) {
                                            $date_duration = "{$start_date->englishMonth} {$start_date->day}, {$start_date->year}";
                                        } else {
                                            if ($start_date->diffInMonths($end_date)) {
                                                $date_duration = "{$start_date->englishMonth} {$start_date->day}, {$start_date->year} - {$end_date->englishMonth} {$end_date->day}, {$end_date->year}";
                                            } else {
                                                $date_duration = "{$start_date->englishMonth} {$start_date->day} - {$end_date->day}, {$end_date->year}";
                                            }
                                        }
                                    @endphp
                                    <small>
                                        {{ $date_duration }}
                                    </small>
                                </div>
                            </a>
                        </div>
                        @if ($loop->iteration > 5)
                            <div class="col d-flex justify-content-center align-items-center">
                                <a href="/events/all">
                                    <h2>More...</h2>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="h-100 w-100 d-flex">
                <h2 class="text-dark m-auto">No events yet</h2>
            </div>
        @endif
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
