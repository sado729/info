@extends('admin.layouts.master')
@section('head')
    <style>
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
        .gal-item{float:left;margin-right: 10px;width:100%;}
        .gal-item>figure>img{object-fit: cover;height: 170px;border-radius: 20px 20px 0px 0px;border: 1px solid #0d6aad;width: 100%;}
        .gallery{text-align: center;}
        button#dodelete{width: 100%;border-radius: 0px 0px 20px 20px;outline: none;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $category->name }}</strong> kateqoriyasini dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('category.admin.index') }}">Kateqoriyalar</a></li>
                <li class="active"><strong>{{ $category->name }}</strong> kateqoriyasini dəyiş</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="{{ route('category.admin.update',['id' => $category->id]) }}" method="post" enctype="multipart/form-data">

                                <div class="col-md-12">
                                    <!-- Custom Tabs -->
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            @foreach($locales as $code => $props)
                                                <li @if ($code=='az') class="active" @endif ><a href="#tab_{{ $code }}" data-toggle="tab" aria-expanded="true">{{ $props['native'] }}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach($locales as $code => $props)
                                                <div class="tab-pane @if ($code=='az') active @endif" id="tab_{{ $code }}">
                                                    <div class="form-group col-md-4 mt-20">
                                                        <label for="name-{{ $code }}">
                                                            Ad
                                                        </label>

                                                        <input type="text" class="form-control" value="{{ $category->translate($code)['name'] }}" id="name-{{ $code }}" name="name:{{ $code }}">
                                                    </div>

                                                    <div class="form-group col-md-4 mt-20">
                                                        <label for="slug-{{ $code }}">
                                                            Link adı
                                                        </label>
                                                        <input type="text" class="form-control" value="{{ $category->translate($code)['slug'] }}" id="slug-{{ $code }}" name="slug:{{ $code }}">
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="category">
                                            Ana Kateqoriyasunu seç
                                        </label>
                                        <select name="category_id" id="category" class="form-control">
                                            <option value="0">
                                                yoxdur
                                            </option>

                                            @foreach($categories as $cat)
                                                @if($category->id == $cat->id) @continue @endif
                                                <option value="{{ $cat->id }}" @if($category['category_id']==$cat['id']) selected @endif>
                                                    {{ $cat->name }}
                                                </option>

                                                @if(isset($cat->categories))
                                                    @foreach($cat->categories as $cat)
                                                        <option value="{{ $cat->id }}" @if($category['category_id']==$cat['id']) selected @endif> └ {{ $cat->name }}</option>

                                                        @if(isset($cat->categories))
                                                            @foreach($cat->categories as $cat)
                                                                <option value="{{ $cat->id }}" @if($category['category_id']==$cat['id']) selected @endif>   └ {{ $cat->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="file">
                                            Şəkil
                                        </label>
                                        <input type="file" class="form-control" placeholder="Şəkil" id="file" name="file">
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