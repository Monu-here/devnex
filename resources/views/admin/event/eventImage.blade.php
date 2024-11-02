@extends('admin.layouts.app')
@section('admin_title','AMFL | Event Gallery ')

@section('header')
     <a href="{{route('admin.event.index')}}">/ Event</a>/ Gallery / Add / {{ $event->name }}
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" />

    <style>
        .form-control {
            padding: 13px 13px !important;
        }

        .label-info {
            background-color: #48b0f7;
        }

        .label {
            padding: 3px 9px;
            font-size: 11px;
            text-shadow: none;
            font-weight: 600;
        }

        p {
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="formSubmit" action="{{ route('admin.event.galleryAdd') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <input type="hidden" name="event_id" id="" value="{{ $event->id }}">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="image" class="form-label">Image <span style="color: red;">*</span></label>
                            <input type="file" required name="image" id="image" class="dropify" accept="image/*">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" id="saveBtn">Submit</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="row">
                    @foreach ($gallerys as $gallery)
                        <div class="col-md-2">
                            <img src="{{ asset($gallery->image) }}" alt="Gallery Image" class="img-fluid">
                            <a href="{{ route('admin.event.galleryDel', ['id' => $gallery->id]) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous"></script>

    <script>
        document.getElementById('formSubmit').addEventListener('submit', function(event) {
            event.preventDefault();
            var saveBtn = document.getElementById('saveBtn');

            saveBtn.disabled = true;
            saveBtn.innerHTML = 'Please wait...';

            setTimeout(function() {
                event.target.submit();
            }, 2000);
        });
        $(document).ready(function() {

            $('.dropify').dropify();


        });
    </script>
@endsection
