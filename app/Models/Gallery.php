<?php

namespace App\Models;


class Gallery extends Model
{
    protected $table = "gallery";
    public $timestamps = true;
    protected $fillable = ['imageable_id','imageable_type','status','image'];

    public function imageable()
    {
        return $this->morphTo();
    }
}