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
    DEVNEX | Home Settings
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="form" action="{{ route('admin.homeSetting.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Home Text <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="home_text" id="home_text"
                                            placeholder="Home Text" value="{{$homeSetting->home_text ?? 'No Text'}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Home Description <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="home_description"
                                            id="home_description" placeholder="Home Description " value="{{$homeSetting->home_description  ?? 'No Description'}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                     <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="file" name="how_we_work_icon_1" id="image" class="dropify" accept="image/*" data-default-file="{{asset($homeSetting->how_we_work_icon_1 ?? 'No Image')}}">
                                        <label for="title" class="form-label">How we work 1  <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="how_we_work_text_1" id="how_we_work_text_1"
                                            placeholder="How we work" value="{{$homeSetting->how_we_work_text_1 ?? 'No Text'}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="file" name="how_we_work_icon_2" id="how_we_work_icon_2" class="dropify" accept="image/*" data-default-file="{{asset($homeSetting->how_we_work_icon_2 ?? 'No Image')}}">
                                        <label for="title" class="form-label">How we work 2 <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="how_we_work_text_2" id="how_we_work_text_2"
                                            placeholder="How we work" value="{{$homeSetting->how_we_work_text_2 ?? 'No Text'}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="file" name="how_we_work_icon_3" id="how_we_work_icon_3" class="dropify" accept="image/*" data-default-file="{{asset($homeSetting->how_we_work_icon_3 ?? 'No Image')}}">
                                        <label for="title" class="form-label">How we work 3 <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="how_we_work_text_3" id=""
                                            placeholder="How we work" value="{{$homeSetting->how_we_work_text_3 ?? 'No Text'}} ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="file" name="how_we_work_icon_4" id="how_we_work_icon_4" class="dropify" accept="image/*" data-default-file="{{asset($homeSetting->how_we_work_icon_4 ?? 'No Image')}}">
                                        <label for="title" class="form-label">How we work 4 <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="how_we_work_text_4" id=""
                                            placeholder="How we work" value="{{$homeSetting->how_we_work_text_4 ?? 'No Text'}} ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="file" name="how_we_work_icon_5" id="how_we_work_icon_5" class="dropify" accept="image/*" data-default-file="{{asset($homeSetting->how_we_work_icon_5 ?? 'No Image')}}">
                                        <label for="title" class="form-label">How we work 5 <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="how_we_work_text_5" id="how_we_work_text_5"
                                            placeholder="How we work" value="{{$homeSetting->how_we_work_text_5 ?? 'No Text'}}">
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
@endsection
