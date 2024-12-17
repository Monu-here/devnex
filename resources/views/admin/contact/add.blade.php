@extends('admin.layouts.app')
@section('admin_title')
    Contact Us | Add
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

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
                <form id="form" action="{{ route('admin.contact.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Address <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Address" value="{{ $contact->address ?? 'No Address' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Email <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email" value="{{ $contact->email ?? 'No Email' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="call" id="call"
                                            placeholder="Phone" value="{{ $contact->call ?? 'No Phone Number' }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Map <span
                                                style="color: red;">*</span></label>
                                        <input type="text" name="map" id="map" class="form-control"
                                            value="{{ $contact->map ?? 'No Map' }}">

                                    </div>
                                </div>


                            </div>
                            <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

        <div class="card">
            <div class="card-body">
                <h3 style="display: flex; justify-content: center;">Contact Us List</h3>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contactLists as $contactList)
                            <tr>
                                <td>{{$contactList->name}}</td>
                                <td>{{$contactList->email1}}</td>
                                <td>{{$contactList->subject}}</td>
                                <td>{{$contactList->message}}</td>
                                <td><a href="{{route('admin.contact.delete',['id'=>$contactList->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('#myTable').DataTable();
        });
        $(document).ready(function() {});
    </script>
@endsection
