<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Notification extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'created_at', 'updated_at', 'expected_at', 'sent_at'];
    protected $fillables = ['message', 'expected_at', 'sent_at'];
    public static function boot() {
        parent::boot();
        static::updating(function($table)  {
            $table->updated_by = Auth::user()->id;
        });
        static::deleting(function($table)  {
            $table->deleted_by = Auth::user()->id;
            $table->save();
        });
        static::creating(function($table)  {
            $table->created_by = Auth::user()->id;
        });
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam');
    }

    public function scopeCustom($query, $custom = 1)
    {
        $query->where('is_custom',$custom);
    }

    public function send()
    {
      $fields = [];
      $fields['contents'] = ["en" => $this->message];
      $fields['app_id'] = env('ONESIGNAL_APP_ID');
      if( count($this->exams) > 0 ) {
        $fields['filters'] = [
          ["field" => "tag", "key" => "exam-" . $notification->exam_id, "relation" => "exists"],
          ["operator" => "OR"],
        ];
      }
      else {
        $fields['included_segments'] = ['All'];
      }
      $fields = json_encode($fields);
      print("\nJSON sent:\n");
      print($fields);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, env('ONESIGNAL_URL'));
      curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type: application/json; charset=utf-8',
      'Authorization: Basic ' . env('ONESIGNAL_TOKEN') ] );
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      $response = curl_exec($ch);
      curl_close($ch);

      $this->sent_at = Carbon::now();
      $this->recepients = $response['recipients'];
      $this->save();
      return $this->recepients;
    }
}
