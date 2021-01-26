<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{

   public function User(){
    	return $this->belongsTo(User::class);
    }
     public function admin(){
    	return $this->belongsTo(admin::class);
    }

    }
