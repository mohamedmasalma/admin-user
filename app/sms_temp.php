<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sms_temp extends Model
{
   
     public function admin(){
    	return $this->belongsTo(admin::class);
    }
    public function user(){
    	return $this->belongsTo(user::class);
    }
}
