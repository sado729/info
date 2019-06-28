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
                <strong>{{ $banner->name }}</strong>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <a class="btn btn-app" href="{{ route('banner.admin.edit',$banner->id) }}">
                                <i class="fas fa-edit fa-lg fa-fw"></i> Dəyiş
                            </a>
                            <a class="btn btn-app" href="{{ route('banner.admin.index') }}">
                                <i class="fas fa-undo fa-lg fa-fw"></i> Geri Qayıt
                            </a>
                            <div id="example1_wrapper" class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        @if(is_file(public_path('/uploads/banner/'.$banner->id.'/large/'.$banner->image)))
                                            <div class="text-center mb-10">
                                                <img src="/uploads/banner/{{ $banner->id }}/large/{{ $banner->image }}" alt="{{ $banner->name }}" class="mw-100">
                                            </div><br>
                                        @endif
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tbody>
                                                <tr role="row" class="even">
                                                    <td>Nömrəsi</td>
                                                    <td>{{ $banner->id }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Adı</td>
                                                    <td>{{ $banner->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Link</td>
                                                    <td>{{ $banner->url }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>İstiqaməti</td>
                                                    <td>{{ $banner->direction=='top' ? 'Yuxarı' : $banner->direction=='left' ? 'Sol' : 'Sağ' }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Status</td>
                                                    <td>
                                                        @if($banner->status=='1')
                                                            <i class="far fa-eye"></i>
                                                        @else
                                                            <i class="far fa-eye-slash"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Paylaşılma vaxtı</td>
                                                    <td>{!! $banner->created_at !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Dəyişilmə vaxtı</td>
                                                    <td>{!! $banner->updated_at !!}</td>
                                                </tr>
                                            </tbody>
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