@extends('layouts.admin')
@section('head')
@endsection
@section('content')
    <div class="card card-authentication1 mx-auto my-4">
        <div class="card-body">
            <div class="card-content">
                <div class="text-center m-2">
                    <a href="{{ route('login') }}">
                        <img src="/app/img/logo/logo.png" alt="logo icon">
                    </a>
                </div>
                <form action="{{ route('register') }}" method="post">
                    {{ csrf_field() }}
                    @include('admin.include.errors')
                    <div class="form-group">
                        <label for="exampleInputName" class="sr-only">Ad</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" id="exampleInputName" class="form-control input-shadow" placeholder="Ad" value="{{ old('name') }}">
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmailId" class="sr-only">E-poçt</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" id="exampleInputEmailId" class="form-control input-shadow" placeholder="E-poçt" value="{{ old('email') }}">
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Şifrə</label>
                        <div class="position-relative has-icon-right">
                            <input type="password" id="password" class="form-control input-shadow" placeholder="Şifrə" name="password">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="sr-only">Şifrə Təkrarı</label>
                        <div class="position-relative has-icon-right">
                            <input type="password" id="password_confirmation" class="form-control input-shadow" placeholder="Şifrə Təkrarı" name="password_confirmation">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="icheck-material-white">
                            <input type="checkbox" id="user-checkbox" checked="" name="rule"/>
                            <label for="user-checkbox">Qaydalar ilə razıyam</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Qeydiyyat et</button>

                </form>
            </div>
        </div>
        <div class="card-footer text-center py-3">
            <p class="text-warning mb-0">Mövcud qeydiyyatın var? <a href="{{ route('login') }}"> Daxil ol</a></p>
        </div>
    </div>
@endsection
@section('scripts')
@endsection