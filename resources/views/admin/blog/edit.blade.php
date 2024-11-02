@extends('admin.layouts.app')
@section('admin_title','AMFL | Blog  Edit')
@section('header')
/ <a href="{{route('admin.blog.index')}}">Blog</a> /  Edit

@endsection
@section('css')
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />

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
                <form id="blogForm" action="{{ route('admin.blog.edit', ['slug' => $blog->slug]) }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                   
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" required
                            aria-describedby="blogTitle" value="{{ $blog->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Description <span style="color: red;">*</span></label>
                        <textarea cols="10" rows="10" class="form-control" id="textarea1" required name="subtitle"
                            aria-describedby="blogSubtitle"> {!! $blog->subtitle !!}</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="author" class="form-label">Author <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="author" value="{{ $blog->author }}"
                                    name="author" aria-describedby="blogAuthor" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="published_at" class="form-label">Publish Date <span style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="published_at" name="published_at"
                                    aria-describedby="Blogpublished_at" value="{{ $blog->published_at }}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="published_at" class="form-label">Status</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="1"
                                        {{ old('is_active', $blog->is_active) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0"
                                        {{ old('is_active', $blog->is_active) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_title" class="form-label">Meta Title <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            aria-describedby="Blogmeta_title" value="{{ $blog->meta_title }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_keywords" class="form-label">Meta Keywords <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="meta_keywords" required
                                            id="meta_keywords" aria-describedby="meta_keywords"
                                            value="{{ $blog->meta_keywords }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description <span style="color: red;">*</span></label>
                                    <textarea name="meta_description" class="form-control" cols="" rows="" id="" required>{{ $blog->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="image" class="form-label">Image <span style="color: red;">*</span></label>
                            <input type="file" name="image" id="image" class="dropify" accept="image/*"
                                data-default-file="{{ isset($blog->image) ? asset($blog->image) : '' }}" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>

    <script>
        $(document).ready(function() {
           

            $('.dropify').dropify();

            
        });

        document.addEventListener('DOMContentLoaded', function() {
            var textarea1 = document.getElementById('textarea1');
            if (textarea1) {
                sceditor.create(textarea1, {
                    format: 'xhtml',
                    style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
                });
            }
        });
    </script>
@endsection
