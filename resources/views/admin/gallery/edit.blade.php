@extends('admin.layouts.master')
@section('head')
    <style>
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
        .gal-item{float:left;margin-right: 10px;width:100%;}
        .gal-item>figure>img{object-fit: cover;height: 170px;border-radius: 20px 20px 0px 0px;border: 1px solid #0d6aad;width: 100%;}
        .gallery{text-align: center;}
        button#dodelete{width: 100%;border-radius: 0px 0px 20px 20px;outline: none;}
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
                <strong>{{ $gallery->name }}</strong> qalereyasını dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('gallery.admin.index') }}">Qalereya</a></li>
                <li class="active"><strong>{{ $gallery->name }}</strong> qalereyasını dəyiş</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="{{ route('gallery.admin.update',['id' => $gallery->id]) }}" method="post"  enctype="multipart/form-data">

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

                                                        <input type="text" class="form-control" value="{{ $gallery->translate($code)['name'] }}" id="name-{{ $code }}" name="name:{{ $code }}">
                                                    </div>

                                                    <div class="form-group col-md-4 mt-20">
                                                        <label for="slug-{{ $code }}">
                                                            Link adı
                                                        </label>
                                                        <input type="text" class="form-control" value="{{ $gallery->translate($code)['slug'] }}" id="slug-{{ $code }}" name="slug:{{ $code }}">
                                                    </div>


                                                    {{ csrf_field() }}

                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-4 mt-20">
                                        <label for="gallery">
                                            Ana qalereyasını seç
                                        </label>
                                        <select name="gallery_id" id="gallery" class="form-control">
                                            <option value="0">
                                                yoxdur
                                            </option>

                                            @foreach($gallery_all as $gal)
                                                @if($gal->id==$gallery->id)
                                                    @continue
                                                @endif
                                                <option value="{{ $gal->id }}"
                                                @if ($gallery->gallery_id==$gal->id)
                                                    selected="selected"
                                                @endif>
                                                    {{ $gal->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="created_at">
                                            Paylaşılma vaxtı
                                        </label>
                                        <div class="input-group date">
                                            <input type="datetime-local" class="form-control pull-right" id="datepicker"  placeholder="Paylaşılma vaxtı" name="created_at" value="{{ \Carbon\Carbon::parse($gallery->getOriginal('created_at'))->format('Y-m-d\TH:i:s') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="file">
                                            Şəkil
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="file" name="file">
                                    </div>

                                    <div class="box-footer col-md-12">
                                        <button type="submit" class="btn btn-primary">Dəyiş</button>
                                    </div>
                                </div>

                            </form>
                            <div class="col-md-12">
                                <h3><b>{{ $gallery->name }}</b> qalereyasının qalereyası</h3>
                                <form role="form" action="{{ route('gallery.admin.update',['id' => $gallery->id]) }}" method="post" enctype="multipart/form-data">
                                    <div class="form-group col-md-4 mt-20">
                                        <label for="filegallery">
                                            Qalereya Şəkilləri <i>[CTRL basılı saxlayıb bir neçəsini seçə bilərsiniz]</i>
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="filegallery" name="filegallery[]" multiple>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-4 mt-20">
                                        <input type="submit" value="Yüklə">
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                                <div class="clearfix"></div>
                                @if(!empty($photos))
                                    <div class="row">
                                        @foreach($photos as $gal)
                                            <div class="col-md-2 gallery" id="{{ $gal->id }}">
                                                <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow" title="{{ $gal->name }}" href="{{ '/uploads/gallery/'.$gallery->id.'/'.$gal->image }}">
                                                    <figure><img class="gal-item-img" src="{{ '/uploads/gallery/'.$gallery->id.'/'.$gal->image }}"></figure>
                                                </a>
                                                <br>
                                                <button id="dodelete" value="{{ $gal->id }}" class="btn btn-primary">Şəkili sil</button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
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

    <script src="https://cdn.ckeditor.com/4.7.0/full-all/ckeditor.js"></script>
    <script src="/admin/js/adapter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.min.js"></script>
    <script>
        $('a.showcase').lightcase({
            transition: 'scrollHorizontal',
            showSequenceInfo: false,
            showTitle: false
        });

        var options = {
            language: 'az',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        $('textarea#editor1').ckeditor(options);

        $(document).ready(function () {

            var csrf = $("input[name='_token']").val();
            // var dodelete = $("button#dodelete");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                }
            });

            $("button#dodelete").click(function() {
                var id =  $(this).val();
                $.ajax({
                    type: 'delete',
                    url: '/admin/gallery/'+id+'/deleteimg',
                    data: {
                        '_token': csrf,
                        'id': id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#'+id).remove();
                    }
                });
            });

        });
    </script>
@endsection