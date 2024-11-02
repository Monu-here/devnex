@extends('admin.layouts.app')
@section('admin_title', 'AMFL | Contact Us ')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <style>
        .custom-table thead tr th:nth-child(n),
        .custom-table tfoot tr th:nth-child(n) {
            padding-left: 20px;
        }
    </style>
@endsection
@section('header')
    / Contact us
@endsection
@section('content')

    <a href="{{ route('admin.contactus.download') }}" class="btn btn-primary btn-sm" style="float: right; margin: 10px;">
        Download List
    </a>
    <table id="table" class="display able table-hover table-responsive-block dataTable with-export custom-table"
        style="width: 100%;">
        <thead>
            <tr>

                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>


@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            var $urls = '{{ route('admin.contactus.fetchData') }}';
            $('#table').DataTable({
                serverSide: true,
                searching: true,
                pageLength: 10,
                ajax: {
                    url: $urls,
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>

@endsection
