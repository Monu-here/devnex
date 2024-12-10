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
                <form id="form" action="{{ route('admin.team.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Team Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Position <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="position" id="position"
                                            placeholder="Position Name">
                                    </div>
                                </div>
                                <hr>
                                <h6>Social Media</h6>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Facebook <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="facebook" id="facebook"
                                            placeholder="Facebook Url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Linkedin <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="linkedin" id="linkedin"
                                            placeholder="Linkedin Url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Github <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="github" id="github"
                                            placeholder="Github Url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Instagram <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="instagram" id="instagram"
                                            placeholder="Instagram Url">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image <span
                                        style="color: red;">*</span></label>
                                <input type="file" name="image" id="image" class="dropify" accept="image/*">
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
