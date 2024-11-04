@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <style>
        p {
            font-size: 14px;
        }
    </style>
@endsection
@section('admin_title')
    DEVNEX | Settings
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="blogForm" action="#" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Website Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            aria-describedby="blogTitle" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Website Title <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            aria-describedby="blogTitle" required>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Copyright Text <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            aria-describedby="blogTitle" required>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Menu Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            aria-describedby="blogTitle" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Social Media <span
                                                style="color: red;">*</span></label>
                                        <a href="javascript:void(0);" style="display: flex; float: right;"
                                            onclick="addKeywordFields()">Add More</a>
                                        <input type="text" class="form-control" name="socialMedia[]" id="title"
                                            aria-describedby="blogTitle" required>

                                        <div id="fieldContainer" style="margin-top : 10px;">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="title" class="form-label">Webiste Logo <span
                                        style="color: red;">*</span></label>

                                <input type="file" name="image" id="image" class="dropify" accept="image/*"
                                    required>

                            </div>

                        </div>
                    </div>



                    <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        function addKeywordFields() {
            var mydiv = document.getElementById("fieldContainer");

            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.placeholder = "Social Media Link";
            newInput.name = "socialMedia[]";
            newInput.className = "form-control";
            newInput.required = true;

            mydiv.appendChild(newInput);
        }
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
