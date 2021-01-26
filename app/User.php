<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


     public  function lead(){
    return $this->hasMany(lead::class);
  }
   public  function campaign(){
    return $this->hasMany(campaign::class);
  }
  public  function profile(){
    return $this->hasOne(profile::class);
  }
  public  function email_temp(){
    return $this->hasMany(email_temp::class);
  }
  public  function sms_temp(){
    return $this->hasMany(sms_temp::class);
  }
  public  function voicemail_temp(){
    return $this->hasMany(voicemail_temp::class);
  }
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','l_name', 'password','vertifyToken',    
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
