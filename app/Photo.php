<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $uploads = '/images/';

    protected $fillable = [
        'file', 'fault_id',
    ];

    public function getFileAttribute($photo){

        return $this->uploads . $photo;

    }

}
