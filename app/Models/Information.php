<?php

namespace App\Models;

class Information extends Model
{

    protected $table = "informations";
    public $timestamps = false;
    protected $fillable = ['facebook','twitter','phone','youtube','about','address','email'];
}
