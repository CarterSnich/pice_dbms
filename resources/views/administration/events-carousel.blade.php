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

        <form id="carousel-images-form" method="POST" enctype="multipart/form-data">
            @csrf
            <ol class="d-grid gap-3 list-group-numbered">
                @foreach ($carousel_images as $image)
                    <li class="row" data-file-id-="{{ $image->file_id }}">
                        <input type="file" class="d-none" name="image[]" accept="image/png,image/jpg">
                        <input type="text" class="d-none" name="file_id[]" value="{{ $image->file_id }}">
                        <div class="col-10">
                            <img src="{{ asset('storage/events-carousel/' . $image->filename) }}" class="img-fluid" alt="$image->filename">
                        </div>
                        <div class="col-2 d-flex flex-column gap-2">
                            <button type="button" class="up-carousel-entry btn btn-block btn-primary" data-file-id="{{ $image->file_id }}">Up</button>
                            <button type="button" class="down-carousel-entry btn btn-block btn-primary" data-file-id="{{ $image->file_id }}">Down</button>
                            <button type="button" class="delete-carousel-entry btn btn-block btn-danger" data-file-id="{{ $image->file_id }}">Remove</button>
                        </div>
                    </li>
                @endforeach
            </ol>
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

        $('.add-image').on('click', function() {
            const FILE_ID = uuid();
            let node = $(`
                <li class="row" data-file-id="${FILE_ID}">
                    <input type="file" name="image[]" accept="image/png,image/jpeg"  class="d-none">
                    <input type="text" name="file_id[]" class="d-none" data-file-id="${FILE_ID}" value="${FILE_ID}">
                    <div class="col-10">
                        <img class="img-fluid" alt="">
                    </div>
                    <div class="col-2 d-flex flex-column gap-2">
                        <button class="up-carousel-entry btn btn-block btn-primary" data-file-id="${FILE_ID}">Up</button>
                        <button class="down-carousel-entry btn btn-block btn-primary" data-file-id="${FILE_ID}">Down</button>
                        <button class="delete-carousel-entry btn btn-block btn-danger" data-file-id="${FILE_ID}">Remove</button>
                    </div>
                </li>
            `)
            node.find('input[type=file]').on('input change', function() {
                if (this.files) {
                    node.find('img').attr('src', URL.createObjectURL(this.files[0]))
                    $('#carousel-images-form>ol').append(node)
                } else {
                    node = null;
                }
            })
            node.find('input[type=file]').click()
        })

        $('#carousel-images-form>ol').on('click', '.delete-carousel-entry', function() {
            $(this).parent().parent().remove()
        })

        $('#carousel-images-form>ol').on('click', '.up-carousel-entry', function() {
            let parent = $(this).parent().parent();
            if (parent.prev().length) {
                parent.prev().fadeOut(300)
                parent.fadeOut(300, function() {
                    parent.insertBefore(parent.prev())
                    parent.fadeIn(300)
                    parent.next().fadeIn(300)
                })
            }

        })

        $('#carousel-images-form>ol').on('click', '.down-carousel-entry', function() {
            let parent = $(this).parent().parent()
            if (parent.next().length) {
                parent.next().fadeOut(300)
                parent.fadeOut(300, function() {
                    parent.insertAfter(parent.next())
                    parent.fadeIn(300)
                    parent.prev().fadeIn(300)
                })
            }
        })
    </script>
@endsection
