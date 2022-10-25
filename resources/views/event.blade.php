@extends('layouts.public_layout')

@section('title', 'Featured Events and News | Philippine Institute of Civil Enginerring')

@section('style')
    <style>
        .section {
            display: grid;
            padding: 3.25rem 10.25rem;
        }

        h1#title {
            font-size: 3.25em
        }

        img#picture {
            width: 100%
        }
    </style>
@endsection

@section('content')
    {{-- some random banner or whatnot --}}
    {{-- <div class="page-banner">
        <img src="{{ asset('images/EVENTS-1536x240.png') }}" alt="">
    </div> --}}

    {{-- event --}}
    <div id="event-wrapper" class="section">

        <div class="d-flex flex-column">
            <h1 class="m-0" id="title">{{ $event->title }}</h1>
            <hr>
            @php
                use Carbon\Carbon;
                $start_date = Carbon::create($event->start_date);
                $end_date = Carbon::create($event->end_date);
                
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
            <span class="mb-3">{{ $date_duration }} | {{ $event->cost ? "P {$event->cost}" : 'FREE' }}</span>

            <img id="picture" class="mb-3" src="{{ asset("/storage/event-pictures/{$event->picture}") }}" alt="">

            <p class="fs-5">{{ $event->description }}</p>

            <hr>

            <div>
                <h4 class="h4 text-info mb-3"> Details</h4>

                <div class="row">
                    <div class="col">
                        @if ($start_date->equalTo($end_date))
                            <p>
                                <strong class="text-dark mb-1">Date:</strong>
                                <br>
                                {{ $date_duration }}
                            </p>
                        @else
                            <p>
                                <strong class="text-dark">Start date:</strong>
                                <br>
                                {{ "{$start_date->englishMonth} {$start_date->day}, {$start_date->year}" }}
                            </p>
                            <p>
                                <strong class="text-dark">End date:</strong>
                                <br>
                                {{ "{$end_date->englishMonth} {$end_date->day}, {$end_date->year}" }}
                            </p>
                        @endif

                        <p>
                            <strong class="text-dark">Cost:</strong>
                            <br>
                            {{ $event->cost ? "P {$event->cost}" : 'FREE' }}
                        </p>
                    </div>

                    <div class="col">

                        <p>
                            <strong class="text-dark">Organizer:</strong>
                            <br>
                            {{ $event->organizer }}
                        </p>

                        <p>
                            <strong class="text-dark">Contact no.:</strong>
                            <br>
                            {{ $event->contact_no }}
                        </p>

                        <p>
                            <strong class="text-dark">Email:</strong>
                            <br>
                            <a href="mailto:{{ $event->email }}" target="_blank">{{ $event->email }}</a>
                        </p>

                        <p>
                            <strong class="text-dark">Website:</strong>
                            <br>
                            <a href="{{ $event->website }}" target="_blank">{{ $event->website }}</a>
                        </p>
                    </div>

                    <div class="col">
                        <p>
                            <strong class="text-dark">Venue:</strong>
                            <br>
                            {{ $event->venue }}
                        </p>
                    </div>

                </div>
            </div>


        </div>

    </div>

@endsection
