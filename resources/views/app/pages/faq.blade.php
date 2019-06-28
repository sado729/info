@extends('app.layouts.master')
@section('title') {{ $menu->title }} @endsection
@section('keyword') {{ $menu->keywords }} @endsection
@section('description') {{ $menu->description }} @endsection
@section('content')
    <main>
    @include('app.include.banner')

        <section class="faq-tutucu forma forma-bg container">
            <div class="faq-header">
                <h2><img src="/app/img/faqLogo.png" alt="faq logo"> Çox verilən suallar</h2>
                <p class="pt-2">Saytda yenisiniz? Ən sadəsindən başlayın </p>
            </div>
            <div class="faq-body pt-2">
                <div id="accordion">
                    @foreach($faqs as $key=>$faq)
                    <div class="card">
                        <div class="card-header" id="heading{{ $key }}">
                            <h5 class="mb-0">
                                <div class="row">
                                    <div class="col-md-12" data-toggle="collapse" data-target="#collapse{{ $key }}"
                                         aria-expanded="true" aria-controls="collapse{{ $key }}">
                                        <div class="d-flex" style="align-items: center; justify-content: space-between;">
                                            <span>{{ $faq->question }}</span>
                                            <i class="faq-icon plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </h5>
                        </div>

                        <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                            <div class="card-body">
                                <p class="text-left"> {{ $faq->reply }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    @include('app.include.statistica')
@endsection
@section('scripts')
    <script>
        $(window).scroll(function() {
            let banner = $(".banner");
            if ($(window).scrollTop() > 160) {
                banner.css({
                    top: '0px',
                    position: 'fixed',
                });
            } else {
                banner.css({
                    top: '160px',
                    position: 'absolute',
                });
            }
        });
    </script>
@endsection