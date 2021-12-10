<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $fillable =[
        'id',
        'from_user_id',
        'from_user_id',
        'to_user_id',
        'body',
    ];

    public function user(){
        return $this -> belongsTo('App\User');
    }


}
