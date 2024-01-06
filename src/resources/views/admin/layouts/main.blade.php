<!doctype html>
<html lang="en">
@include('admin.layouts.head')
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')

        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
        @include('admin.layouts.footer')
    </div>
@include('admin.layouts.script')
</body>
</html>
