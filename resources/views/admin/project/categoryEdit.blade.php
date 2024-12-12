@extends('admin.layouts.app')
@section('admin_title')
    Project Category | Edit
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
<div id="ccc"></div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="form" action="{{ route('admin.project.categoryEdit',['id'=>$category->id]) }}" enctype="multipart/form-data"
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
                                            placeholder="Project Category Name" value="{{$category->name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

