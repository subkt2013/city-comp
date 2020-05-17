<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostNBA extends Model
{
    protected $fillable =[
        'contributor_name',
        'title',
        'body',
    ];

    public function comments(){
        return $this -> hasMany('App\CommentNBA');
    }
}
