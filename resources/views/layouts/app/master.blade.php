<!DOCTYPE html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>
    @include('layouts.app.meta')
    @include('layouts.app.head')
    @yield('head')
</head>
<body id="menu" class="alt-bg">
    @yield('content')
    @include('layouts.app.scripts')
    @yield('scripts')
</body>
</html>