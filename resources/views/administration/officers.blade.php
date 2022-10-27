@extends('layouts.administration_layout')

{{-- title --}}
@section('title', 'Events Carousel | PICE Administration')

{{-- page style --}}
@section('style')
    <style>
        #content {
            display: flex;
            flex-flow: column;
            height: calc(100vh - 3.25rem);
            padding: 1.25rem;
            overflow-y: auto;
            overflow-x: hidden
        }

        .img-fluid {
            max-height: 256px;
        }

        #carousel-images-form li {
            position: relative;
        }

        #carousel-images-form li::before {
            position: absolute;
            left: -1.25rem;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    {{-- top nav bar --}}
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Events Carousel</span>
            <div class="d-flex flex-row gap-2">
                <a href="/administration/events" class="btn btn-primary">Go back to Events</a>
                <button type="submit" form="carousel-images-form" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post-event-modal">Save</button>
            </div>
        </div>
    </nav>

    <div id="content">

        <form id="officers-form" method="POST" enctype="multipart/form-data">
            @csrf
                
                


        </form>

        <div class="btn btn-primary btn-block mt-3 add-image">Add image</div>

    </div>
@endsection

{{-- page script --}}
@section('script')
    <script src="{{ asset('js/moment.js') }}"></script>
    <script>
        // enable tooltips
        let tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-has-tooltip="true"]')
        );
        let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        let toast = new bootstrap.Toast(document.querySelector('#toast-wrapper>.toast'))

    </script>
@endsection
