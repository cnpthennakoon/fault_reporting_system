<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fault extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'organization', 'name', 'email', 'title', 'description', 'status', '',

    ];
    public function photos(){

        return $this->hasMany('App\Photo');

    }

    public function respond(){

        return $this->hasMany('App\FaultReply');

    }

}
