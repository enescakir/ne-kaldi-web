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

    public function favorites(){
        return $this->hasMany('App\Favorite');
    }

    public function getCreatedAtAttribute(){
        return date("d.m.Y h:m:s", strtotime($this->attributes['created_at']));
    }
}
