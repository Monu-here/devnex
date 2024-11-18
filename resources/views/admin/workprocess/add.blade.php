@extends('admin.layouts.app')
@section('admin_title')
    Workprocess | Add
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
                <form id="form" action="{{ route('admin.WorkProcess.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Workprocess Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="title" id="Title"
                                            placeholder="Workprocess Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Workprocess Description <span
                                                style="color: red;">*</span></label>
                                        <textarea name="description" placeholder="Workprocess Description" class="form-control" id="" cols="30"
                                            rows="10"></textarea>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="title" class="form-label">Workprocess Icon <span
                                        style="color: red;">*</span></label>
                                <input type="file" name="image" id="image" class="dropify" accept="image/*">
                            </div>
                            <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($workProcesss as $workProcess)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($workProcess->image ?? asset('assets/image/right-image.png')) }}"
                            class="card-img-top">
                        <div class="card-body">
                            <form id="form-{{ $workProcess->id }}" action="#" method="POST">
                                @csrf
                                <h5 class="card-title" id="title-{{ $workProcess->id }}">
                                    <span class="edit-title" id="edit-title-{{ $workProcess->id }}">
                                        {{ $workProcess->title ?? 'No Title' }}
                                    </span>
                                    <input type="text" id="input-title-{{ $workProcess->id }}"
                                        value="{{ $workProcess->title ?? 'No Title' }}" name="title" class="form-control"
                                        style="display: none;">
                                </h5>
                                <p class="card-text" id="description-{{ $workProcess->id }}">
                                    <span class="edit-description" id="edit-description-{{ $workProcess->id }}">
                                        {{ $workProcess->description ?? 'No Description' }}
                                    </span>
                                    <textarea id="input-description-{{ $workProcess->id }}" class="form-control" name="description" style="display: none;">{{ $workProcess->description ?? 'No Description' }}</textarea>
                                </p>
                                <button id="b-save-{{ $workProcess->id }}" class="btn btn-primary btn-sm"
                                    style="display: none;">SAVE
                                </button>
                                <br>
                            </form>
                            <div>
                                <button class="btn btn-primary btn-sm" onclick="toggleEdit({{ $workProcess->id }})"
                                    id="textchnage">EDIT</button>
                                <a href="{{ route('admin.WorkProcess.delete', ['id' => $workProcess->id]) }}"
                                    class="btn btn-danger btn-sm">DEL</a>
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



        function toggleEdit(id) {
            const titleText = document.getElementById('edit-title-' + id);
            const titleInput = document.getElementById('input-title-' + id);
            const descriptionText = document.getElementById('edit-description-' + id);
            const descriptionInput = document.getElementById('input-description-' + id);
            const buttonHide = document.getElementById('b-save-' + id);
            const form = document.getElementById('save-form-' + id);
            if (titleInput.style.display === 'none') {
                titleInput.style.display = 'inline';
                titleText.style.display = 'none';
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
                var url = "{{ route('admin.WorkProcess.edit', ['id' => ':id']) }}".replace(':id', id);
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
