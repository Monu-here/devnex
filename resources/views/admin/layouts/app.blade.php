<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('admin_title')</title>
    <link rel="shortcut icon" type="image/png" href="" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>
    a{
        text-decoration: none;
    }
</style>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}
    @yield('css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>

                <!-- Sidebar navigation-->
                @include('admin.layouts.menu')
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('admin.layouts.header')
            

            <!--  Header End -->
            <div class="container-fluid" style="width: unset">
                @yield('content')
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
    @include('admin.layouts.sweetalert')
    <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>

    {{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    @yield('js')

</body>

</html>
