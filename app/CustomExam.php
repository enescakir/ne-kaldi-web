<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CustomExam extends Model
{
  protected $dates = ['deleted_at', 'created_at', 'updated_at', 'date'];

  public function getDayToDateAttribute()
  {
   return Carbon::now()->diffInDays($this->date, false);
  }
  
}
