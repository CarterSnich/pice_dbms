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
    </style>
@endsection

{{-- page content --}}
@section('content')
    {{-- top nav bar --}}
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">officers</span>
            <div class="d-flex flex-row gap-2">
                <button type="submit" form="officers-form" class="btn btn-primary">Save</button>
            </div>
        </div>
    </nav>

    <div id="content">

        <form id="officers-form" method="POST" enctype="multipart/form-data">
            @csrf
                
            <div class="row">
                <div class="col-4">President</div>
                <div class="col-8">
                    <p></p>
                </div>
            </div>


        </form>

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
