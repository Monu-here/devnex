@extends('admin.layouts.app')
@section('admin_title', ' AMFL | Event Add')

@section('header')
   / <a href="{{route('admin.event.index')}}">Event</a> / New
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" />
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
                <form id="formSubmit" action="{{ route('admin.event.add') }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="active" class="form-label">Status</label>
                            <select class="form-select" id="active" name="active" >
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous"></script>
    <script>
        document.getElementById('formSubmit').addEventListener('submit', function(event) {
            event.preventDefault();
            var saveBtn = document.getElementById('saveBtn');

            saveBtn.disabled = true;
            saveBtn.innerHTML = 'Please wait...';

            setTimeout(function() {
                event.target.submit();
            }, 2000);
        });
        $(document).ready(function() {

            $('.dropify').dropify();


        });
    </script>
@endsection
