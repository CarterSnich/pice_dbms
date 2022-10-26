@extends('layouts.public_layout')

@section('title', 'Home | Philippine Institute of Civil Enginerring')

@section('content')
    <style>
        #banner-carousel button,
        #banner-carousel button:active {
            outline: none;
            box-shadow: none;
        }

        #banner-carousel button:hover {
            background-color: transparent;
        }
    </style>

    @if ($carousel_images->count())
        <div id="banner-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                @for ($i = 0; $i < $carousel_images->count(); $i++)
                    <button type="button" data-bs-target="#banner-carousel" data-bs-slide-to="{{ $i }}" @if ($i == 0) class="active" aria-current="true" @endif aria-label="{{ $i + 1 }}"></button>
                @endfor
            </div>
            <div class="carousel-inner">
                @foreach ($carousel_images as $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ asset('storage/events-carousel/' . $image->filename) }}" class="d-block w-100" alt="{{ $image->filename }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#banner-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#banner-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif


    <style>
        #message-from-the-president {
            display: grid;
            grid-template-columns: 1fr 5fr;
            padding: 5.25rem;
            gap: 3.25rem;
        }

        #message-from-the-president>div.message {
            display: flex;
            flex-flow: column
        }


        #message-from-the-president>div.message>h4 {
            margin-top: auto;
            color: #1c76c5;
        }
    </style>
    <div id="message-from-the-president">
        <div class="president-mob">
            <img src="{{ asset('images/canlas.png') }}" alt="">
        </div>
        <div class="message">
            <h4>MESSAGE FROM THE PRESIDENT</h4>
            <blockquote>“One of the fundamental canons of the Philippine Institute of Civil Engineers’ Code of Ethics is that “civil engineers shall hold paramount the safety, health, and welfare of the public and shall strive to comply with the principles of sustainable development in the performance of their duties.” With sustainability as our priority, we will build strong infrastructures that can withstand future challenges”. </blockquote>
        </div>
    </div>
@endsection
