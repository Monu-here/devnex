@extends('admin.layouts.app')
@section('admin_title')
    Project | Add
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
                <form id="form" action="{{ route('admin.project.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="project_category_id"  value="{{$category->id}}">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Project Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Project Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="url" class="form-label">Project url <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="url" id="url"
                                            placeholder="Project Url">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Project Description <span
                                                style="color: red;">*</span></label>
                                        <textarea name="description" placeholder="Project Description" class="form-control" id="" cols="30"
                                            rows="10"></textarea>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="image" class="form-label">Project Icon <span
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






    <div class="row">
        @foreach ($projects as $project)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset($project->image ?? asset('assets/image/right-image.png')) }}" class="card-img-top">
                    <div class="card-body">
                        <form id="form-{{ $project->id }}" action="#" method="POST">
                            @csrf
                            <h5 class="card-title" id="title-{{ $project->id }}">
                                <span class="edit-title" id="edit-title-{{ $project->id }}">
                                    {{ $project->name ?? 'No Title' }}
                                </span>
                                <input type="text" id="input-title-{{ $project->id }}"
                                    value="{{ $project->name ?? 'No Title' }}" name="name" class="form-control"
                                    style="display: none;">
                            </h5>
                            <h5 class="card-title" id="title-{{ $project->id }}">
                                <span class="edit-url" id="edit-url-{{ $project->id }}">
                                    {{ $project->url ?? 'No Title' }}
                                </span>
                                <input type="text" id="input-url-{{ $project->id }}"
                                    value="{{ $project->url ?? 'No Title' }}" name="url" class="form-control"
                                    style="display: none;">
                            </h5>
                            <p class="card-text" id="description-{{ $project->id }}">
                                <span class="edit-description" id="edit-description-{{ $project->id }}">
                                    {{ $project->description ?? 'No Description' }}
                                </span>
                                <textarea id="input-description-{{ $project->id }}" class="form-control" name="description" style="display: none;">{{ $project->description ?? 'No Description' }}</textarea>
                            </p>
                            <button id="b-save-{{ $project->id }}" class="btn btn-primary btn-sm"
                                style="display: none;">SAVE
                            </button>
                            <br>
                        </form>
                        <div>
                            <button class="btn btn-primary btn-sm" onclick="toggleEdit({{ $project->id }})"
                                id="textchnage">EDIT</button>
                            <a href="{{ route('admin.project.delete', ['id' => $project->id]) }}"
                                class="btn btn-danger btn-sm">Del</a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });


        function toggleEdit(id) {
            const urlText = document.getElementById('edit-url-' + id);
            const urlInput = document.getElementById('input-url-' + id);

            const titleText = document.getElementById('edit-title-' + id);

            const titleInput = document.getElementById('input-title-' + id);
            const descriptionText = document.getElementById('edit-description-' + id);
            const descriptionInput = document.getElementById('input-description-' + id);
            const buttonHide = document.getElementById('b-save-' + id);
            const form = document.getElementById('save-form-' + id);
            if (titleInput.style.display === 'none') {
                titleInput.style.display = 'inline';
                urlInput.style.display = 'inline';
                titleText.style.display = 'none';
                urlText.style.display = 'none';
                descriptionInput.style.display = 'none';
                descriptionInput.style.display = 'block';
                descriptionText.style.display = 'none';
                buttonHide.style.display = 'block';
                form.style.display = 'block';
                document.getElementById('form-title-' + id).value = titleInput.value;
                document.getElementById('form-description-' + id).value = descriptionInput.value;
            } else {
                titleInput.style.display = 'none';


                titleText.style.display = 'inline';
                descriptionInput.style.display = 'none';
                descriptionText.style.display = 'inline';

                buttonHide.style.display = 'none';
                form.style.display = 'none';
            }
        }
        $(document).ready(function() {

            $('form[id^="form-"]').submit(function(e) {

                e.preventDefault();
                var id = $(this).attr('id').split('-')[1];
                var url = "{{ route('admin.project.edit', ['id' => ':id']) }}".replace(':id', id);
                var form = $(this);
                var formData = new FormData(form[0]);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log('Form submitted successfully');
                        location.reload();

                    },
                    error: function(data) {
                        console.log('An error occurred.');
                    },
                });
            });
        });
    </script>
@endsection
