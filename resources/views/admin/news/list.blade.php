@extends('layouts.admin.master')
@section('head')
    <link rel="stylesheet" href="/admin/css/nestable.css">
@endsection
@section('content')
    @include('admin.include.header')
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Xəbərlər</h4>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pt-2 pb-4">
                                <a href="{{ route('news.admin.create') }}" id="doadd" class="btn btn-primary btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-plus"></i>
                                    <span>Əlavə et</span>
                                </a>
                                <a id="dodelete" class="sil btn btn-danger btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-delete"></i>
                                    <span>Sil</span>
                                </a>
                                <a id="doactive" class="btn btn-success btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-eye"></i>
                                    <span>Aktiv et</span>
                                </a>
                                <a id="dopassive" class="btn btn-dark btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-eye-off"></i>
                                    <span>Passiv et</span>
                                </a>
                                <a class="btn btn-excel  btn-square waves-effect waves-light m-1" type="button"
                                   id="doexcel" onclick="$('.table').tblToExcel();">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span>Excelə yüklə</span>
                                </a>
                            </div>
                            @if(count($list)==0)
                                <div class="alert alert-warning mb-0" role="alert">
                                    <div class="alert-icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="alert-message">
                                        <span><strong>Diqqət!</strong>  Burada hər hansı bir bloq mövcud deyil! Bloq əlavə etmək üçün <a href="{{ route('news.admin.create') }}" class="text-muted font-weight-bold">klik edin.</a></span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(count($list)>0)
                            {{ csrf_field() }}
                            @include('admin.include.filter',['route'=>'news.admin.index'])
                            <div class="table-responsive-sm bt-switch col-md-12 container my-2">
                              <table class="table table-sm table-bordered table-hover table-striped text-center" id="nestable" data-url="{{ route('news.admin.sort') }}">
                                    <thead>
                                        <tr role="row" class="even">
                                            <th></th>
                                            <th>Seç</th>
                                            <th>Nömrə</th>
                                            <th>Adı</th>
                                            <th>Link adı</th>
                                            <th>Tarix</th>
                                            <th>Status</th>
                                            <th>Dəyiş</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sortable">
                                    @foreach($list as $news)
                                        <tr role="row" class="even tr" data-id="{{ $news->id }}">
                                            <td class="handler"><i class="fa fa-arrows-alt"></i></td>
                                            <td>
                                                <div class="icheck-material-primary icheck-inline">
                                                    <input type="checkbox" id="{{$news->id}}" name="check[]" value="{{ $news->id }}"/>
                                                    <label for="{{$news->id}}"></label>
                                                </div>
                                            </td>
                                            <td>{{ $news->id }}</td>
                                            <td>{{ $news->name }}</td>
                                            <td>{{ $news->slug }}</td>
                                            <td>{{ $news->created_at }}</td>
                                            <td>
                                                <input class="my_check" type="checkbox"{{ ($news->status=='1') ? ' checked' : '' }} data-on-color="success"
                                                       data-off-color="default" data-size="small"
                                                       data-on-text="<i class='zmdi zmdi-eye'></i>"
                                                       data-off-text="<i class='zmdi zmdi-eye-off'></i>">
                                            </td>
                                            <td>
                                                <a href="{{ route('news.admin.edit',$news->id) }}" class="mx-2" title="edit"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="{{ route('news.admin.show',$news->id) }}" class="mx-2" title="show"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @include('admin.include.filter',['route'=>'news.admin.index'])
                            @endif
                        </div>
               </div>
             </div>
         </div>
        @include('admin.include.footer')
    </div>

@endsection
@section('scripts')

    <script src="/admin/js/jquery-ui.min.js"></script>
    <script src="/admin/js/jquery.tableToExcel.js"></script>
    <script src="/admin/js/bootstrap-toggle.min.js"></script>
    <script src="/admin/js/nestable.js"></script>
    <script src="/admin/js/sortable.min.js"></script>
    <script src="/admin/js/script.js"></script>
    <script>
        $(document).ready(function () {
            var ckbox = $("input[name='check[]']"),
                csrf = $("input[name='_token']").val(),
                doactive = $("#doactive"),
                dopassive = $("#dopassive"),
                dodelete = $("#dodelete"),
                checkall = $('#checkall'),
                bswitch = $('.bootstrap-switch');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                }
            });

            checkall.click(function() {
                if ($(this).is(':checked')) {
                    $('.even td input').attr('checked', true);
                } else {
                    $('.even td input').attr('checked', false);
                }
            });

            bswitch.on('switchChange.bootstrapSwitch',function(){
                var fieldid = $(this).parent().parent().data('id');
                if($(this).hasClass('bootstrap-switch-on')) {
                    var url = '/admin/news/doactive';
                }else {
                    var url = '/admin/news/dopassive';
                }

                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        '_token': csrf,
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.news;
                    }
                });
            });

            ckbox.on('click',function () {
                $(this).each( function () {
                    var fieldid = $(this).val();
                    doactive.click(function() {
                        $.ajax({
                            type: 'post',
                            url: '/admin/news/doactive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.news;
                            }
                        });
                    });
                    dopassive.click(function() {
                        $.ajax({
                            type: 'post',
                            url: '/admin/news/dopassive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.news;
                            }
                        });
                    });
                    dodelete.click(function() {
                        swal({
                            title: "Silmək istədiyinizə əminsinizmi?",
                            text: "Bu sahə silindikdə bir daha geri qaytarılmaya bilər !",
                            icon: "warning",
                            buttons: true,
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Sil!",
                            closeOnConfirm: false
                        }).then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'delete',
                                    url: '/admin/news/delete',
                                    data: {
                                        '_token': csrf,
                                        'id': fieldid
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        swal("Done!","It was succesfully deleted!","success");
                                        window.location.href = data.news;
                                    }
                                });
                            } else {
                                swal("Silmə əməliyyatı ləğv edildi!");
                            }
                        });


                    });
                });
            });

        });
    </script>
@endsection