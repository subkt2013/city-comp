<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithComment extends Model
{
    protected $fillable = [
        'with_post_id',
        'body',
        'commenter_name',
    ];

    public function post(){
        return $this->belongsTo('App\WithPost');
    }
}
