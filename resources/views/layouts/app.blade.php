<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('includes.header')
    @include('includes.leftside')
    @yield('content')
    @include('includes.footer')
    @yield('js')
</body>

</html>
