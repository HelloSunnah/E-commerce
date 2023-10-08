<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini layout-fixed">
<head>
    @include('backend.partials.head')
</head>
<div class="wrapper">
    <!-- Navbar Start -->
    @include('backend.partials.nav')
    <!-- Navbar End -->

    <!-- Sidebar Start -->
    @include('backend.partials.sidebar')
    <!-- Sidebar End -->

    <!-- Main Content Start -->
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @include('backend.partials.messages')
                @yield('content')
            </div>
        </section>
    </div>
    <!-- Main Content End -->

    <!-- Footer Start -->
    @include('backend.partials.footer')
    <!-- Footer End -->

</div>
<!-- ./wrapper -->

@include('backend.partials.footer_script')

</body>
</html>
