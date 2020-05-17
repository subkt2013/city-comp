<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentNBA extends Model
{
    protected $fillable = [
        'body',
        'commenter_name',
    ];

    public function post(){
        return $this->belongsTo('App\PostNBA');
    }
}
