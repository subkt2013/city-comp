<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable =[
        'title',
        'body',
        'gender',
        'name',
        'title',
        'url',
        'tag_id',
    ];

    public function comments(){
        return $this -> hasMany('App\Comment');
    }
}
