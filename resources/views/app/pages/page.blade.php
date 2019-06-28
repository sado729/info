@extends('app.layouts.master')
@section('title') {{ $menu->title }} @endsection
@section('keyword') {{ $menu->keywords }} @endsection
@section('description') {{ $menu->description }} @endsection
@section('ogimg')  @endsection
@section('content')
    <main>
    @include('app.include.banner')

        <div class="about forma forma-bg px-4 py-4 container">
            <div class="about-textHeader">
                <h2 class="text-center">{{ $menu->name }}</h2>
            </div>
            <div class="about-textBody">
                {!! $menu->text !!}
            </div>

        </div>

    @include('app.include.statistica')
@endsection
@section('scripts')
    <script>
        $(window).scroll(function() {
            let banner = $(".banner");
            if ($(window).scrollTop() > 160) {
                banner.css({
                    top: '0px',
                    position: 'fixed',
                });
            } else {
                banner.css({
                    top: '160px',
                    position: 'absolute',
                });
            }
        });
    </script>
@endsection