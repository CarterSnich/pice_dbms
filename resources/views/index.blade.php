@extends('layouts.public_layout')


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
    <div id="banner-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#banner-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#banner-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#banner-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#banner-carousel" data-bs-slide-to="3" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#banner-carousel" data-bs-slide-to="4" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#banner-carousel" data-bs-slide-to="5" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner1.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner4.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner5.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner6.png') }}" class="d-block w-100" alt="...">
            </div>
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

    <style>
        #message-from-the-president {
            display: grid;
            grid-template-columns: 1fr 5fr;
            padding: 5rem;
            gap: 5rem;
        }

        #message-from-the-president>div.message {
            display: flex;
            flex-flow: column
        }


        #message-from-the-president>div.message>h4 {
            margin-top: auto
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
