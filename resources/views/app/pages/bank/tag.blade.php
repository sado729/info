@extends('app.layouts.master')
@section('title') #{{ $tag }} | Banklar @endsection
@section('keyword')  @endsection
@section('description')  @endsection
@section('ogimg')  @endsection
@section('head')
@endsection
@section('content')
    <main>
    @include('app.include.banner')
        <section class="bank-tutucu container">
            <div class="row" itemprop="hasOfferCatalog" itemscope itemtype="http://schema.org/OfferCatalog">
                <h1 itemprop="name">Banklar</h1>
                <h2 itemprop="name" class="font-italic">#{{ $tag }}</h2>

                @foreach($banks as $bank)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="banklar" itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog">
                        <a href="{{ route('bank.show',$bank->slug) }}" title="{{ $bank->name }}">
                            <img src="/uploads/bank/{{ $bank->id }}/large/{{ $bank->image }}" alt="{{ $bank->name }}" class="img-fluid">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    @include('app.include.statistica')
    </main>
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