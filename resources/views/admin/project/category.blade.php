@extends('admin.layouts.app')
@section('admin_title')
    Project Category | Add
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
                <form id="form" action="{{ route('admin.project.category') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Project Category Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name  "
                                            placeholder="Project Category Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($categories as $project)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">

                            <span class="edit-title" id="edit-title-{{ $project->id }}">
                                {{ $project->name ?? 'No Title' }}
                            </span>
                            <br>
                            <br>
                            <div>
                                <a href="{{ route('admin.project.list', ['category' => $project->id]) }}"
                                    class="btn btn-primary btn-sm" id="textchnage">Project</a>
                                <a href="{{ route('admin.project.delete-category', ['id' => $project->id]) }}"
                                    class="btn btn-danger btn-sm">Del</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
