<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.layout.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Start of Main Content -->
            <div id="content">
                @include('admin.layout.header')

                <!-- Begin Page Content -->
                @yield('section')
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            @include('admin.layout.footer')

            @stack('scripts')
</body>

</html>
