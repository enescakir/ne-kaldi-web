<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Exam extends Model
{
    public function setDateAttribute($date){
        return $this->attributes['date'] = Carbon::createFromFormat('d/m/Y - H:i', $date);
    }

    public function scopeActivated($query){
        $query->where('activated',1);
    }

}
