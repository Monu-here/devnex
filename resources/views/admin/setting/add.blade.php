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
                <form id="form" action="#" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Website Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="website_name" id="website_name"
                                            placeholder="Website Name" value="{{ $setting->website_name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Website Title <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="website_title" id="website_title"
                                            placeholder="Website Title" value="{{ $setting->website_title ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Copyright Text <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="copyright" id="copyright"
                                            placeholder="Copyright text " value="{{ $setting->copyright ?? '' }}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Social Media <span
                                                style="color: red;">*</span></label>
                                        <a href="javascript:void(0);" style="display: flex; float: right;"
                                            onclick="addSocialMedia()">Add More</a>
                                        @if (!empty($setting['social_media']))
                                            @foreach (json_decode($setting['social_media']) as $socialMedia)
                                                {{-- // $s  ocialMediaString = implode(', ',json_decode($setting['social_media'] ?? '[]')); --}}
                                                <input type="text" class="form-control" name="social_media[]"
                                                    value="{{ $socialMedia }}">
                                            @endforeach
                                        @else
                                            <input type="text" class="form-control" name="social_media[]"
                                                placeholder="Social media">
                                        @endif

                                        <div id="socialField" style="margin-top : 10px;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="title" class="form-label">Webiste Logo <span
                                        style="color: red;">*</span></label>
                                <input type="file" name="website_image" id="webiste_image" class="dropify"
                                    accept="image/*"
                                    data-default-file="{{ asset($setting->website_image ?? 'assets/image/logo.png') }}">
                            </div>
                            <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <ul class="custom-list">
        {{-- @foreach ($others as $item)
            <li class="list-item">
                @php
                   
                @endphp
              
            </li>
            <li>
                {{ $menuNameString }}
            </li>
        @endforeach --}}


    </ul>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        function addMenu() {
            var mydiv = document.getElementById("menuField");

            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.placeholder = "Menu Name";
            newInput.name = "menu_name[]";
            newInput.className = "form-control";
            newInput.required = true;

            mydiv.appendChild(newInput);
        }

        function addSocialMedia() {
            var mydiv = document.getElementById("socialField");
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.placeholder = "Social Media Name ";
            newInput.name = "social_media[]";
            newInput.className = "form-control";
            newInput.required = true;

            mydiv.appendChild(newInput);
        }
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
