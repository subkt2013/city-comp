<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NbaComment extends Model
{
    protected $fillable = [
        'nba_post_id',
        'body',
        'commenter_name',
    ];

    public function post(){
        return $this->belongsTo('App\NbaPost');
    }
}
