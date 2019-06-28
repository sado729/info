@extends('layouts.admin')
@section('content')
    <div class="card card-authentication1 mx-auto my-5">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase pb-2">ŞİFRƏNİ YENİLƏ</div>
                <p class="pb-2">Zəhmət olmasa e-poçt ünvanını daxil edin. Sizə şifrəni yeniləmək üçün link göndəriləcək!</p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    @include('admin.include.errors')
                    <div class="form-group">
                        <label for="exampleInputEmailAddress">E-poçt ünvanı</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" id="exampleInputEmailAddress" class="form-control input-shadow" placeholder="E-poçt ünvanı" name="email">
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-light btn-block mt-3">Şifrə sıfırla</button>
                </form>
            </div>
        </div>
        <div class="card-footer text-center py-3">
            <p class="text-warning mb-0"><a href="{{ route('login') }}">Əvvələ qayıt</a></p>
        </div>
    </div>
@endsection
