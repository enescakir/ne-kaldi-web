<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $fillable = [
        'exam_id', 'visitor_id',
    ];

    public function visitor(){
        return $this->belongsTo('App\Visitor');
    }

    public function exam(){
        return $this->belongsTo('App\Exam');
    }

}
