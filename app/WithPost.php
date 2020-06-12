<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithPost extends Model
{
    protected $fillable =[
        'contributor_name',
        'title',
        'body',
    ];

    public function with_comments(){
        return $this -> hasMany('App\WithComment');
    }
}
