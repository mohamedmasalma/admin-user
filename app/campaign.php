<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
     public function User(){
    	return $this->belongsTo(user::class);
    }
     public function admin(){
    	return $this->belongsTo(admin::class);
    }
}
