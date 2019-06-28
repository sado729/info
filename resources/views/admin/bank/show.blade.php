@extends('admin.layouts.master')
@section('head')
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $bank->name }}</strong>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <a class="btn btn-app" href="{{ route('bank.admin.edit',$bank->id) }}">
                                <i class="fas fa-edit fa-lg fa-fw"></i> Dəyiş
                            </a>
                            <a class="btn btn-app" href="{{ route('bank.admin.index') }}">
                                <i class="fas fa-undo fa-lg fa-fw"></i> Geri Qayıt
                            </a>
                            <div id="example1_wrapper" class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        @if(is_file(public_path('/uploads/bank/'.$bank->id.'/large/'.$bank->image)))
                                            <div class="text-center mb-10">
                                                <img src="/uploads/bank/{{ $bank->id }}/large/{{ $bank->image }}" alt="{{ $bank->name }}" class="mw-100">
                                            </div><br>
                                        @endif
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tbody>
                                                <tr role="row" class="even">
                                                    <td>Nömrəsi</td>
                                                    <td>{{ $bank->id }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Adı</td>
                                                    <td>{{ $bank->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Link Adı</td>
                                                    <td>{{ $bank->url }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Mətn</td>
                                                    <td>{!! $bank->text !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Status</td>
                                                    <td>
                                                        @if($bank->status=='1')
                                                            <i class="far fa-eye"></i>
                                                        @else
                                                            <i class="far fa-eye-slash"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Paylaşılma vaxtı</td>
                                                    <td>{!! $bank->created_at !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Dəyişilmə vaxtı</td>
                                                    <td>{!! $bank->updated_at !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h3>SEO</h3>
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tr role="row" class="even">
                                                <td>Title</td>
                                                <td>{{ $bank->title }}</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td>Keywords</td>
                                                <td>{{ $bank->keywords }}</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td>Description</td>
                                                <td>{{ $bank->description }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
@endsection