@extends('admin.layouts.app')
@section('admin_title','DEVNEX | Blog ')
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
    / Blog 
@endsection
@section('content')
<a href="{{route('admin.blog.add')}}" class="btn btn-primary" style="float: right; margin: 10px;">Create New</a>
<table id="table" class="display able table-hover table-responsive-block dataTable with-export custom-table"
style="width: 100%;">
        <thead>
            <tr>

                <th>SN</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Author</th>
                <th>Published At</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var $urls = '{{ route('admin.blog.fetchData') }}';
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
                        data: 'title',
                        name: 'title',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'subtitle',
                        name: 'subtitle'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'published_at',
                        name: 'published_at',
                        
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
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
