<?php

namespace App\Http\Controllers\App;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class NewsController extends Controller
{
    public function all()
    {
        $news = News::list();

        return view('app.pages.news.all',compact('news','menu'));
    }

    public function show($slug){

        $news = News::whereTranslation('slug', $slug)->first();
        $news->view_count += 1;
        $news->save();

        $relatednews = News::where('id','!=',$news->id)->where('status','1')->limit(3)->get();

        return view('app.pages.news.show', compact('news','relatednews','menu'));
    }

    public function get(Request $request){

        $news = News::find($request->id);
        $news->view_count += 1;
        $news->save();

        return response()->json(['product' => $news]);
    }

    public function type(Request $request){

        $news = News::where('type',$request->id)->get();
        
        $list = '';
        
        foreach($news as $n){
            $list .= '
                    <div class="col-12 col-sm-4 text-center portal">
                    <a class="news-itm" data-id="'.$n->id.'">
                        <div class="news-div">
                            <div class="news-itm-date">
                                <div class="news-itm-month">'.$n->created_at->format('F').'</div>
                                <div class="news-itm-day">'.$n->created_at->format('d').'</div>
                                <div class="news-itm-year">'.$n->created_at->format('Y').'</div>
                            </div>
                            <div class="news-itm-ttl bld">
                                <div>
                                    '.$n->text.'
                                    <div class="clearfix"></div>
                                    <a href="#" data-id="'.$n->id.'" id="button" class="button exp">Ətraflı</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                    ';
        }

        return response()->json(['news' => $list]);
    }
}