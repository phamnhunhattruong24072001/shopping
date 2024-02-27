<!doctype html>
<html lang="en">
@include('admin.layouts.head')
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('admin.layouts.sidebar')
            @include('admin.layouts.navbar')

            <div class="right_col" role="main">
                @yield('content')
            </div>

            @include('admin.layouts.footer')
        </div>
    </div>
@include('admin.layouts.script')
</body>
</html>
