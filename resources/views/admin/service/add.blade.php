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
                <form id="form" action="{{ route('admin.service.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Service Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Service Name">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Project Description <span
                                                style="color: red;">*</span></label>
                                        <textarea name="description" placeholder="Service Description" class="form-control" id="" cols="30"
                                            rows="10"></textarea>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="image" class="form-label">Service Icon <span
                                        style="color: red;">*</span></label>
                                <input type="file" name="icon" id="icon" class="dropify" accept="image/*">
                            </div>
                            <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($service->icon) }}" class="card-img-top">
                        <div class="card-body">
                            <span class="edit-title" id="edit-title-{{ $service->id }}">
                                {{ $service->name ?? 'No Title' }}
                            </span>
                            <br>
                            @php
                                $truncated = \Str::limit(strip_tags($service->description), 150);
                            @endphp
                            <span class="edit-url" id="edit-url-{{ $service->id }}">
                                {{ $truncated }}
                            </span>
                            <br>
                            <div>
                                <a href="{{route('admin.service.edit',['id'=>$service->id])}}" class="btn btn-primary btn-sm" id="textchnage">EDIT</a>
                                <a href="{{route('admin.service.delete',['id'=>$service->id])}}" class="btn btn-danger btn-sm">Del</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
