<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{

    protected $fillable = [
        'ip_adress', 'device_id', 'name',
    ];

    public function visits(){
        return $this->hasMany('App\Visit');
    }

}
