<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komiks extends Model
{
    protected $table = 'komiks';

    protected $fillable =[
        'title',
        'genre',
        'year',
        'poster'
    ];
}
