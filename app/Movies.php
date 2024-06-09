<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table = 'Movies';

    protected $fillable =[
        'title',
        'genre',
        'year',
        'poster'
    ];
}
