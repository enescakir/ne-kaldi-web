<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
  protected $fillable = [
    'ip_address', 'device_id', 'name', 'platform', 'via'
  ];

  public function visits(){
    return $this->hasMany('App\Visit')->orderBy('created_at', 'DESC');
  }

  public function actions(){
    return $this->hasMany('App\VisitorAction', 'visitor_id');
  }

  public function custom_exams(){
    return $this->hasMany('App\CustomExam', 'visitor_id')->orderBy('created_at', 'DESC');
  }

  public function favorites(){
    return $this->hasMany('App\Favorite')->orderBy('created_at', 'DESC');
  }

  public function getCreatedAtAttribute(){
    return date("d.m.Y h:m:s", strtotime($this->attributes['created_at']));
  }
}
