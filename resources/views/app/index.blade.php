@extends('layouts.app.master')
@section('title')  @endsection
@section('keyword')  @endsection
@section('description') @endsection
@section('head')
@endsection
@section('content')
    {{ csrf_field() }}
    @include('app.include.loader')
    @include('app.include.header')
    @include('app.include.cover')
    @include('app.include.nav')
    @include('app.include.main')
    @include('app.include.modal')
@endsection
@section('scripts')
    <script>
    $(document).ready(function () {
        var csrf = $("input[name='_token']").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        });

        $(".fp-tableCell").on("click",".button", function(){
            var fieldid = $(this).data('id');
            $.ajax({
                type: 'post',
                url: '/bloq/get',
                data: {
                    '_token': csrf,
                    'id': fieldid
                },
                dataType: 'json',
                success: function(data) {
                    document.querySelector('.bg-modal').style.display = 'flex';
                    $('.clsScroll').html('<h5 class="text-center">'+data.product.name+'</h5><br><p>'+data.product.text+'</p>');
                }
            });
        });

        $('ul#qmenu li>a').on('click', function () {
            var fieldid = $(this).data('id');

            if(fieldid!=0 && fieldid<4){
                $.ajax({
                    type: 'post',
                    url: '/bloq/type',
                    data: {
                        '_token': csrf,
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('.fp-tableCell section.content .row').html(data.news);
                    }
                });
            }
            
        });

        document.querySelector('.close').addEventListener('click',function () {
            document.querySelector('.bg-modal').style.display = 'none';
        });
    });
    </script>
@endsection