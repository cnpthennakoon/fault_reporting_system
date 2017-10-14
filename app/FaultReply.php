<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaultReply extends Model
{
    protected $fillable = [

        'message', 'fault_id', 'user_id',

    ];

    public function user(){

        return $this->belongsTo('App\User');

    }


    public function respond(){

        return $this->belongsToMany('App\Fault');

    }
}
