@extends('app.layouts.master')
@section('title') {{ $menu->title }} @endsection
@section('keyword') {{ $menu->keywords }} @endsection
@section('description') {{ $menu->description }} @endsection
@section('content')
    <main>
    @include('app.include.banner')
    <div class="contact forma container">
        <h2>Bizimlə əlaqə</h2>

        <form id="contact-form" method="post" action="{{ route('form_send') }}" role="form">
            {{ csrf_field() }}
            @include('app.errors.validation')
            <div class="forma forma-tutucu controls">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Ad</label>
                            <input id="form_name" type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Soyad</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" value="{{ old('surname') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email</label>
                            <input id="form_email" type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_tel">Əlaqə nömrəsi</label>
                            <input id="form_tel" type="text" maxlength="10" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Mesaj</label>
                            <textarea id="form_message" name="message" class="form-control" rows="4">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success btn-send" value="Göndər">
                    </div>
                </div>

            </div>

        </form>

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