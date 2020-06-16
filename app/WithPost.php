<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithPost extends Model
{
    protected $table = 'with_posts';

    protected $fillable =[
        'user_id',
        'contributor_name',
        'title',
        'body',
    ];

    public function with_comments(){
        return $this -> hasMany('App\WithComment');
    }
}
