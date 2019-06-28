<?php

namespace App\Models;


class NewsTags extends Model
{

    protected $table = "news_tag";
    protected $fillable = ['tag_id','news_id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
