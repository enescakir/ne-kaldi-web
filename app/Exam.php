<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Exam extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public static function boot() {
        parent::boot();

        // create a event to happen on updating
        static::updating(function($table)  {
            $table->updated_by = Auth::user()->id;
        });

        // create a event to happen on deleting
        static::deleting(function($table)  {
            $table->deleted_by = Auth::user()->id;
            $table->save();
        });

        // create a event to happen on saving
        static::creating(function($table)  {
            $table->created_by = Auth::user()->id;
        });
    }

    public function setDateAttribute($date){
        return $this->attributes['date'] = Carbon::createFromFormat('d/m/Y - H:i', $date);
    }

    public function setStartAttribute($date){
        return $this->attributes['start'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function setEndAttribute($date){
        return $this->attributes['end'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function scopeActivated($query){
        $query->where('activated',1);
    }

    public function visits(){
        return $this->hasMany('App\Visit');
    }

    public function favorites(){
        return $this->hasMany('App\Favorite');
    }

    public function favoriters(){
        return $this->belongsToMany('App\Visitor','favorites','exam_id', 'visitor_id')->whereNull('deleted_at');
    }

    public function notifications(){
        return $this->belongsToMany('App\Notification');
    }

}
