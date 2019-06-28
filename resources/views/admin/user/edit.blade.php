@extends('admin.layouts.master')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border: 1px solid #3c8dbc;
        }
        #emuraciet{float: left;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $user->name }}</strong> istifadəçini dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('user.admin.index') }}">İstifadəçi</a></li>
                <li class="active"><strong>{{ $user->name }}</strong> istifadəçini dəyiş</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('admin.layouts.include.errors')
                            <form role="form" action="{{ route('user.admin.update',['id' => $user->id]) }}" method="post" enctype="multipart/form-data">

                                <div class="col-md-12">

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="name">
                                            Ad
                                        </label>

                                        <input type="text" class="form-control" value="{{ $user['name'] }}" id="name" name="name">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="email">
                                            Email
                                        </label>

                                        <input type="email" class="form-control" value="{{ $user['email'] }}" id="email" name="email">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="password">
                                            Şifrə  <i>[Şifrəni dəyişdirmək istəmirsinizsə boş buraxın]</i>
                                        </label>

                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="bank_id">
                                            Bank seç
                                        </label>
                                        <select name="bank_id" id="bank_id" class="form-control">
                                            <option value="">Bank işçisi deyil</option>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->id }}" @if($user->bank['id']==$bank['id']) selected="selected" @endif>
                                                    {{ $bank->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="role">
                                            Vəzifə seç
                                        </label>
                                        <select name="role_id" id="role" class="form-control">

                                            @foreach($roles as $r)
                                                @if($r->id=='1') @continue @endif
                                                <option value="{{ $r->id }}" @if($user->roles->first()['id']==$r['id']) selected="selected" @endif>
                                                    {{ $r->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="status">
                                            Status seç
                                        </label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" @if($user['status']==1) selected="selected" @endif>
                                                Aktiv
                                            </option>
                                            <option value="0" @if($user['status']==0) selected="selected" @endif>
                                                Passiv
                                            </option>
                                        </select>
                                    </div>

                                    {{ csrf_field() }}

                                    <div class="box-footer col-md-12">
                                        <button type="submit" class="btn btn-primary">Dəyiş</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.layouts.include.footer')
@endsection
@section('scripts')
    <!-- FastClick -->
    <script src="/admin/js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/js/adminlte.min.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
@endsection