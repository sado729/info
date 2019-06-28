@extends('admin.layouts.master')
@section('head')
    <style>
        .mt-20{margin-top: 20px;}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/css/lightcase.min.css">
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $branch->name }}</strong> filialını dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('branch.admin.index') }}">Filiallar</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="{{ route('branch.admin.update',['id' => $branch->id]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-4 mt-20">
                                    <label for="name">
                                        Ad
                                    </label>

                                    <input type="text" class="form-control" placeholder="Ad" id="name" name="name" value="{{ $branch['name'] }}">
                                </div>

                                @if(!$bank)
                                <div class="form-group col-md-4 mt-20">
                                    <label for="bank_id">
                                        Bank seç
                                    </label>
                                    <select name="bank_id" id="bank_id" class="form-control">
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}" {{ $branch['bank_id']==$bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                    <input type="hidden" name="bank_id" value="{{ $bank->id }}">
                                @endif

                                <div class="form-group col-md-4 mt-20">
                                    <label for="phone">
                                        Telefon
                                    </label>

                                    <input type="text" class="form-control" placeholder="Telefon" id="phone" name="phone" value="{{ $branch['phone'] }}">
                                </div>

                                <div class="form-group col-md-4 mt-20">
                                    <label for="faks">
                                        Faks
                                    </label>

                                    <input type="text" class="form-control" placeholder="Faks" id="faks" name="faks" value="{{ $branch['faks'] }}">
                                </div>

                                <div class="form-group col-md-4 mt-20">
                                    <label for="email">
                                        Email
                                    </label>

                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ $branch['email'] }}">
                                </div>

                                <div class="form-group col-md-4 mt-20">
                                    <label for="address">
                                        Ünvan
                                    </label>

                                    <input type="text" class="form-control" placeholder="Ünvan" id="address" name="address" value="{{ $branch['address'] }}">
                                </div>

                                <div class="box-footer col-md-12">
                                    <button type="submit" class="btn btn-primary">Dəyiş</button>
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
    <script src="/admin/js/fastclick.js"></script>
    <script src="/admin/js/adminlte.min.js"></script>
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.7.0/full-all/ckeditor.js"></script>
    <script src="/admin/js/adapter.js"></script>
    <script>
        let options = {
            language: 'az',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        $('textarea#editor1').ckeditor(options);
    </script>
@endsection