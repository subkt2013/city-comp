<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NbaComment extends Model
{
    protected $fillable = [
        'post_id_nba',
        'body',
        'commenter_name',
    ];

    public function post(){
        return $this->belongsTo('App\NbaPost');
    }
}
