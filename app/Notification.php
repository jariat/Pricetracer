<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = true;
    protected $table = 'notifications';
    protected $fillable = ['title','message','user_id','new','starred','trashed'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
