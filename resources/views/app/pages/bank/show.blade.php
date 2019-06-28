@extends('app.layouts.master')
@section('title') {{ $bank->title }} @endsection
@section('keyword') {{ $bank->keywords }} @endsection
@section('description') {{ $bank->description }} @endsection
@section('ogimg') https://kredit.az/uploads/bank/{{ $bank->id }}/large/{{ $bank->image }}" @endsection
@section('head')
@endsection
@section('content')
    <main>
    @include('app.include.banner')

        <section class="bank-tutucu forma forma-bg container">

            <div class="bank-header container" itemprop="broker" itemscope itemtype="http://schema.org/BankOrCreditUnion">
                <h1 class="py-4" itemprop="name">{{ $bank->name }}</h1>
                <meta itemprop="image" content="https://kredit.az/uploads/bank/{{ $bank->id }}/large/{{ $bank->image }}"/>
                <span itemprop="description" class="d-none">{!! $bank->text !!}</span>
                <div class="row">
                    <div class="col-md-3">
                        <a class="mx-5" href="javascript:void(0);" title="{{ $bank->name }}">
                            <img src="/uploads/bank/{{ $bank->id }}/large/{{ $bank->image }}" class="img-fluid" alt="{{ $bank->name }}">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <p class="mx-5">
                            {!! $bank->text !!}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div class="tags">
                            @foreach(explode(',',$bank->keywords) as $tag)
                                <a href="{{ route('bank.tag',$tag) }}">#{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="bank-body" itemprop="hasOfferCatalog" itemscope itemtype="http://schema.org/OfferCatalog">
                <h2 itemprop="name">Kredit məhsulları</h2>
                <ul class="list-unstyled">
                    @foreach($products as $product)
                        @if($product->type=='kredit')
                            <li class="media">
                                <img class="mr-3" src="/uploads/product/{{ $product->id }}/large/{{ $product->image }}" alt="{{ $product->name }}">
                                <div class="media-body" itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog">
                                    <h3 class="mt-0 mb-1" itemprop="name">{{ $product->name }}</h3>
                                    {!! $product->text !!}
                                    <meta itemprop="image" content="https://kredital.az/uploads/product/{{ $product->id }}/large/{{ $product->image }}"/>
                                    <span itemprop="description" class="d-none">{!! $product->text !!}</span>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <hr>
            <div class="bank-body" itemprop="hasOfferCatalog" itemscope itemtype="http://schema.org/OfferCatalog">
                <h2 itemprop="name">Kampaniyalar</h2>
                <ul class="list-unstyled">
                    @foreach($products as $product)
                        @if($product->type=='kampaniya')
                            <li class="media">
                                <img class="mr-3" src="/uploads/product/{{ $product->id }}/large/{{ $product->image }}" alt="{{ $product->name }}">
                                <div class="media-body" itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog">
                                    <h3 class="mt-0 mb-1">{{ $product->name }}</h3>
                                    {!! $product->text !!}
                                    <meta itemprop="image" content="https://kredital.az/uploads/product/{{ $product->id }}/large/{{ $product->image }}"/>
                                    <span itemprop="description" class="d-none">{!! $product->text !!}</span>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
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