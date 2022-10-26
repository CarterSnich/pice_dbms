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

        .table-wrapper {
            height: 100%;
            flex-grow: 1;
            overflow: auto;
        }


        table>thead {
            position: sticky;
            top: 0;
        }

        img[data-application=photo] {
            min-height: 200px;
            min-width: 200px;
            height: 200px;
            width: 200px;
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
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post-event-modal">Save</button>
            </div>
        </div>
    </nav>

    <div id="content">

        <form class="d-grid gap-3" method="POST" enctype="multipart/form-data">
            @csrf

            @foreach ($carousel_images as $image)
                <div class="row">
                    <input type="file" name="image[]" class="d-none" id="">
                    <div class="col-10">
                        <img src="{{ asset('storage/events-carousel/' . $image->filename) }}" class="img-fluid" alt="$image->filename">
                    </div>
                    <div class="col-2 d-flex flex-column gap-2">
                        <button class="btn btn-block btn-primary">Up</button>
                        <button class="btn btn-block btn-primary">Down</button>
                        <button class="btn btn-block btn-danger">Remove</button>
                    </div>
                </div>
            @endforeach

        </form>

        <div class="btn btn-primary btn-block mt-3">
            Add image
        </div>

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
