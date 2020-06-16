<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NbaPost extends Model
{

    protected $table = 'nba_posts';

    protected $fillable =[
        'user_id',
        'contributor_name',
        'title',
        'body',
    ];

    public function nba_comments(){
        return $this -> hasMany('App\NbaComment');
    }
}
