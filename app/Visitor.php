<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{

    protected $fillable = [
        'ip_address', 'device_id', 'name', 'platform', 'via',
    ];

    public function visits(){
        return $this->hasMany('App\Visit');
    }

}
