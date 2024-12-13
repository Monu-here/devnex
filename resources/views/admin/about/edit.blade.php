@extends('admin.layouts.app')
@section('admin_title')
    About | Edit | {{$about->title}}
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />

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
                <form id="form" action="{{ route('admin.about.edit',['id'=>$about->id]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="title" id="Title"
                                            placeholder=" Name" value="{{ $about->title ?? 'no title' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label"> Description <span
                                                style="color: red;">*</span></label>
                                        <textarea name="description" placeholder=" Description" class="form-control" id="description" cols="30"
                                            rows="10">{!! $about->description ?? 'no description' !!}</textarea>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="title" class="form-label">Image <span style="color: red;">*</span></label>
                                <input type="file" name="image" id="image" class="dropify" accept="image/*"
                                    data-default-file="{{ asset($about->image ?? 'no img') }}">
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
    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/xhtml.min.js"></script>
    <script>
        // Replace the textarea #example with SCEditor
        var textarea = document.getElementById('description');
        sceditor.create(textarea, {
            format: 'xhtml',
            style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
        });
    </script>
@endsection
