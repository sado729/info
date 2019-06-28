@extends('app.layouts.master')
@section('title') {{ env('app.name') }} @endsection
@section('keyword')  @endsection
@section('description')  @endsection
@section('ogimg')  @endsection
@section('head')
@endsection
@section('content')
    <main>
    @include('app.include.banner')

        <div class="forma container">

            <form action="{{ route('bank.all') }}" method="GET">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" style="opacity: .4;" value="{{ $search ?: '' }}" placeholder="Axtardığınız bankın adını yazın..." name="search">
                                <button type="submit" class="btn btn-lg btn-orange ml-3">Axtar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <section class="bank-tutucu container">
            <div class="row" itemprop="hasOfferCatalog" itemscope itemtype="http://schema.org/OfferCatalog">
                <h1 itemprop="name">Banklar</h1>

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