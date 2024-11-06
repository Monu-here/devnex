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
                <form id="form" action="#" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Home Text <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="home_text" id="home_text"
                                            placeholder="Website Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Button Text <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="btn_text" id="btn_text"
                                            placeholder="Website Title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Home Description <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="home_description"
                                            id="home_description" placeholder="Copyright text ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Achievements Nmuber <span
                                                style="color: red;">*</span></label>
                                        <a href="javascript:void(0);" style="display: flex; float: right;"
                                            onclick="achievementsnumber()">Add More</a>

                                        <input type="text" class="form-control" name="achievements_number[]"
                                            id="achievements_number" placeholder="Social media ">

                                        <div id="achievementsnumber" style="margin-top : 10px;">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Achievements Text <span
                                                style="color: red;">*</span></label>
                                        <a href="javascript:void(0);" style="display: flex; float: right;"
                                            onclick="achievementsname()">Add More</a>

                                        <input type="text" class="form-control" name="achievements_name[]"
                                            id="achievements_name" placeholder="Social media ">

                                        <div id="achievementsname" style="margin-top : 10px;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h3>Services & Our Approach</h3>
                    <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                </form>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" name="image" id="image" class="form-control dropify">
                            <div class="mb-3">
                                <label for="title" class="form-label">Service Name <span
                                        style="color: red;">*</span></label>
                                <a href="javascript:void(0);" style="display: flex; float: right;" onclick="xxx()">Add
                                    More</a>

                                <input type="text" class="form-control" name="service" id="service"
                                    placeholder="Services Name ">
                                    <input type="text" class="form-control" name="approch_desc" id="service"
                                    placeholder="Approach Description ">

                                <div id="xxx" style="margin-top : 10px;">

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <input type="file" name="image" id="image" class="form-control dropify">
                            <div class="mb-3">
                                <label for="title" class="form-label">Our Approach <span
                                        style="color: red;">*</span></label>
                                <a href="javascript:void(0);" style="display: flex; float: right;"
                                    onclick="ourApproch()">Add
                                    More</a>

                                <input type="text" class="form-control" name="approch_name" id="service"
                                    placeholder="Approach Name ">
                                <input type="text" class="form-control" name="approch_desc" id="service"
                                    placeholder="Approach Description ">

                                <div id="ourApproch" style="margin-top : 10px;">

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <ul class="custom-list">
        @foreach ($homeSettings as $item)
            <li class="list-item">
                @php
                    $socialMediaString = implode(', ', json_decode($item['achievements_name'] ?? '[]'));

                @endphp

            </li>
            <li>
                {{ $socialMediaString }}
            </li>
        @endforeach

        <style>
            .form-control {
                margin: 10px 0;
            }
        </style>
    </ul>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        let inputCounter = 1;


        function xxx() {
            if (inputCounter < 3) {
                var mydiv = document.getElementById("xxx");
                // image
                var newImageInput = document.createElement("input");
                newImageInput.type = "file";
                newImageInput.name = `image[]`;
                newImageInput.className = "form-control dropify";
                newImageInput.required = true;
                mydiv.appendChild(newImageInput);
                $(newImageInput).dropify();
                // service name
                var newServiceInput = document.createElement("input");
                newServiceInput.type = "text";
                newServiceInput.placeholder = "Services Name";
                newServiceInput.name = `service_name[]`;
                newServiceInput.className = "form-control";
                newServiceInput.required = true;
                mydiv.appendChild(newServiceInput);
                // service descriotion
                var newServiceInput = document.createElement("input");
                newServiceInput.type = "text";
                newServiceInput.placeholder = "Services Description";
                newServiceInput.name = `service_desc[]`;
                newServiceInput.className = "form-control";
                newServiceInput.required = true;
                mydiv.appendChild(newServiceInput);
                inputCounter++;
            } else {
                alert("You can add up to 3 services only.");
            }
        }

        let approchCount = 1;
        function ourApproch() {
            if (approchCount < 3) {
                var mydiv = document.getElementById("ourApproch");
                var newImageInput = document.createElement("input");
                newImageInput.type = "file";
                newImageInput.name = `image[]`;
                newImageInput.className = "form-control dropify";
                newImageInput.required = true;
                mydiv.appendChild(newImageInput);
                $(newImageInput).dropify();
                // approch name
                var newOurApproch = document.createElement("input");
                newOurApproch.type = "text";
                newOurApproch.placeholder = "Approch Name";
                newOurApproch.name = `approch_name[]`;
                newOurApproch.className = "form-control";
                newOurApproch.required = true;
                mydiv.appendChild(newOurApproch);
                // approch descriotion
                var newOurApproch = document.createElement("input");
                newOurApproch.type = "text";
                newOurApproch.placeholder = "Approch Description";
                newOurApproch.name = `approch_desc[]`;
                newOurApproch.className = "form-control";
                newOurApproch.required = true;
                mydiv.appendChild(newOurApproch);
                approchCount++;
            } else {
                alert("You can add up to 3 approch only.");
            }
        }


        function achievementsnumber() {
            var mydiv = document.getElementById("achievementsnumber");

            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.placeholder = "Achievements Number";
            newInput.name = "achievements_number[]";
            newInput.className = "form-control";
            newInput.required = true;
            mydiv.appendChild(newInput);
        }

        function achievementsname() {
            var mydiv = document.getElementById("achievementsname");
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.placeholder = "Achievements Name ";
            newInput.name = "achievements_name[]";
            newInput.className = "form-control";
            newInput.required = true;
            mydiv.appendChild(newInput);
        }
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script>
        <script type="text/javascript">
    var frm = $('#contactForm1');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
</script>
    </script>
@endsection
