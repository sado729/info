<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.admin.meta')
    @include('layouts.admin.head')
    @yield('head')
</head>
<body class="bg-theme bg-theme1 @yield('body')">
<div id="wrapper">
    @yield('content')
    <a href="javaScript:void(0);" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    @include('layouts.admin.scripts')
    @yield('scripts')
</div>
</body>
</html>