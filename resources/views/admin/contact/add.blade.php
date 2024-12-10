@extends('admin.layouts.app')
@section('admin_title')
    Service | Add
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <style>
        p {
            font-size: 14px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="form" action="{{ route('admin.contact.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Address <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Email <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="call" id="call"
                                            placeholder="Phone">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Map <span
                                                style="color: red;">*</span></label>
                                       <input type="url" name="map" id="map" class="form-control">

                                    </div>
                                </div>


                            </div>
                        </div>
                        <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
