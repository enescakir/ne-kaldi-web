<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function visitor(){
        return $this->belongsTo('App\Visitor');
    }
}
