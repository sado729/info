@extends('layouts.admin.master')
@section('head')
@endsection
@section('content')
    <div class="card card-authentication1 mx-auto my-5">
        <div class="card-body">
            <div class="card-content">
                <div class="text-center m-3">
                    <a href="{{ route('login') }}">
                        <img src="/app/img/logo1.png" alt="logo icon">
                    </a>
                </div>
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    @include('admin.include.errors')
                    <div class="form-group">
                        <label for="email" class="sr-only">E-poçt ünvanınız</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" id="email" class="form-control input-shadow" placeholder="E-poçt ünvanınız" value="{{ old('email') }}" name="email">
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Şifrə</label>
                        <div class="position-relative has-icon-right">
                            <input type="password" id="password" class="form-control input-shadow" placeholder="Şifrə" value="{{ old('password') }}" name="password">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="icheck-material-white">
                                <input type="checkbox" id="user-checkbox" checked="" name="remember" value="1"/>
                                <label for="user-checkbox">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group col-6 text-right">
                            <a href="{{ route('forgot')  }}">Parolu unutdum?</a><br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-light btn-block col-6 mx-auto">Daxil ol</button>

                </form>
            </div>
        </div>
        <div class="card-footer text-center py-3">
            <p class="text-warning mb-0">İstifadəçi hesabın yoxdu? <a href="{{ route('register') }}">Yeni qeydiyyat</a></p>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
