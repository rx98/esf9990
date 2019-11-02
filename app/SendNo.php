<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendNo extends Model
{
    protected $guarded=[];

    public function User(){
        return $this->belongsTo('app/User');
    }
}
