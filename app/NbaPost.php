<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NbaPost extends Model
{
    protected $fillable =[
        'contributor_name',
        'title',
        'body',
    ];

    public function nba_comments(){
        return $this -> hasMany('App\NbaComment');
    }
}
