<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class template extends Model
{
   
     public function admin(){
    	return $this->belongsTo(admin::class);
    }
}
