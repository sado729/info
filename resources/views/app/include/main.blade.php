<!-- BEGIN OF site main content content here -->
<main class="page-main" id="mainpage">
    <div class="section page-register page page-cent" id="s-register">
        <section class="content">
            <div class="row">
                @foreach($news as $n)
                <div class="col-12 col-sm-4 text-center portal">
                    <a class="news-itm" data-id="{{ $n->id }}">
                        <div class="news-div">
                            <div class="news-itm-date">
                                <div class="news-itm-month">{{ $n->created_at->format('F') }}</div>
                                <div class="news-itm-day">{{ $n->created_at->format('d') }}</div>
                                <div class="news-itm-year">{{ $n->created_at->format('Y') }}</div>
                            </div>
                            <div class="news-itm-ttl bld">
                                <div>
                                    {!! $n->text !!}
                                    <div class="clearfix"></div>
                                    <a href="#" data-id="{{ $n->id }}" id="button" class="button exp">Ətraflı</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</main>