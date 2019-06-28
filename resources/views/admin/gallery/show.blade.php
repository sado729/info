@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/css/lightcase.min.css">
    <style>
        .gal-item{float:left;margin-right: 10px;}
        .gal-item>figure>img{max-height: 200px;border-radius: 20px;border:1px solid #0d6aad;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $gallery->name }}</strong> qalereyası
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('gallery.admin.index') }}">Qalereya</a></li>
                <li class="active"><strong>{{ $gallery->name }}</strong> qalereyası</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <a class="btn btn-app" href="{{ route('gallery.admin.edit',$gallery->id) }}">
                                <i class="fas fa-edit fa-lg fa-fw"></i> Dəyiş
                            </a>
                            <a class="btn btn-app" href="{{ route('gallery.admin.index') }}">
                                <i class="fas fa-undo fa-lg fa-fw"></i> Geri Qayıt
                            </a>
                            <div id="example1_wrapper" class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="text-center mb-10">
                                            <img src="/uploads/gallery/{{ $gallery->image }}" alt="{{ $gallery->name }}" class="mw-100">
                                        </div>
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tbody>

                                                <tr role="row" class="even">
                                                    <td>Nömrəsi</td>
                                                    <td>{{ $gallery->id }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Adı</td>
                                                    <td>{{ $gallery->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Link adı</td>
                                                    <td>{{ $gallery->slug }}</td>
                                                </tr>
                                                @if($gallery->parent)
                                                <tr role="row" class="even">
                                                    <td>Ana Qalereyası</td>
                                                    <td>{{ $gallery->parent->name }}</td>
                                                </tr>
                                                @endif
                                                <tr role="row" class="even">
                                                    <td>Baxış sayı</td>
                                                    <td>{{ $gallery->view_count }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Status</td>
                                                    <td>
                                                        @if($gallery->status=='1')
                                                            <i class="far fa-eye"></i>
                                                        @else
                                                            <i class="far fa-eye-slash"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Paylaşılma vaxtı</td>
                                                    <td>{!! $gallery->created_at !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Dəyişilmə vaxtı</td>
                                                    <td>{!! $gallery->updated_at !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @if(!empty($photos))
                                            <div class="row">
                                                <h3><b>{{ $gallery->name }}</b> qalereyasının qalereyası</h3>
                                                @foreach($photos as $gal)
                                                    <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow" title="{{ $gal->name }}" href="{{ '/uploads/gallery/'.$gallery->id.'/'.$gal->image }}">
                                                        <figure><img class="gal-item-img" src="{{ '/uploads/gallery/'.$gallery->id.'/'.$gal->image }}"></figure>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
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
    <!-- FastClick -->
    <script src="/admin/js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/js/adminlte.min.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.min.js"></script>
    <script>
        $('a.showcase').lightcase({
            transition: 'scrollHorizontal',
            showSequenceInfo: false,
            showTitle: false
        });
    </script>
@endsection