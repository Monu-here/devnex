@extends('admin.layouts.app')
@section('admin_title')
    Service | Edit
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
                <form id="form" action="{{ route('admin.service.edit',['id'=>$service->id]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Service Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Service Name" value="{{$service->name}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Project Description <span
                                                style="color: red;">*</span></label>
                                        <textarea name="description" placeholder="Service Description" class="form-control" id="" cols="30"
                                            rows="10"> {{$service->description}}</textarea>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="image" class="form-label">Service Icon <span
                                        style="color: red;">*</span></label>
                                <input type="file" name="icon" id="icon" class="dropify" accept="image/*" data-default-file="{{ asset($service->icon ?? 'no img') }}">
                            </div>
                            <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                        </div>
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
