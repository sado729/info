@extends('layouts.admin.master')
@section('head')
@endsection
@section('content')
    @include('admin.include.sidebar')
    @include('admin.include.header')
    <!--Start content-wrapper-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-md-12">
                    <h4 class="page-title">{{ $news->name }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Ana Səhifə</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.admin.index') }}">Xəbərlər</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pt-2 pb-4">
                                <a href="{{ route('news.admin.edit',$news->id) }}"
                                   class="btn btn-primary btn-square waves-effect waves-light m-1">
                                    <i class="fa fa-edit"></i>
                                    <span>Düzəliş et</span>
                                </a>
                                <a id="dodelete" class="sil btn btn-danger btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-delete"></i>
                                    <span>Sil</span>
                                </a>
                                <a href="{{ route('news.admin.index') }}" class="btn btn-warning btn-square waves-effect waves-light m-1">
                                    <i class="icon-action-undo"></i>
                                    <span>Əvvələ qayıt </span>
                                </a>

                                <a class="btn btn-excel  btn-square waves-effect waves-light m-1" type="button"
                                   id="doexcel" onclick="$('.table').tblToExcel();">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span>Excelə yüklə</span>
                                </a>
                            </div>
                            <div class="col-md-8 offset-md-2 text-center">
                                <table class="table table-lg table-responsive-md table-bordered table-striped table-hover text-center" role="grid">
                                    <tbody>
                                    <tr role="row" class="even">
                                        <td>Nömrəsi</td>
                                        <td>{{ $news->id }}</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Adı</td>
                                        <td>{{ $news->name }}</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Link adı</td>
                                        <td><a href="{{ route('news.show',$news->slug) }}" target="_blank" class="border bg-bluegreylight">Xəbərə keçid et</a></td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Baxış sayı</td>
                                        <td>{{ $news->view_count }}</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Mətn</td>
                                        <td>{!! $news->text !!}</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Status</td>
                                        <td>
                                            @if($news->status=='1')
                                                <i class="zmdi zmdi-eye"></i>
                                            @else
                                                <i class="zmdi zmdi-eye-off"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Paylaşılma vaxtı</td>
                                        <td>{!! $news->created_at !!}</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Dəyişilmə vaxtı</td>
                                        <td>{!! $news->updated_at !!}</td>
                                    </tr>  
                                    </tbody>
                                </table>
                                {{--
                                @if(!empty($news->image))
                                    <div class="row">
                                        <h3><b>{{ $news->name }}</b> xəbərinin qalereyası</h3>
                                        @foreach($news->image as $gal)
                                            <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow" title="{{ $gal->name }}" href="{{ '/uploads/news/'.$news->id.'/gallery/large/'.$gal->image }}">
                                                <figure><img class="gal-item-img" src="{{ '/uploads/news/'.$news->id.'/gallery/little/'.$gal->image }}"></figure>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->

        </div>
    </div>
@endsection
@section('scripts')
    <script src="/admin/js/jquery.tableToExcel.js"></script>
@endsection