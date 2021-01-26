<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\adminResetPasswordNotification;
class admin extends Authenticatable
{
    use Notifiable;
     public  function lead(){
    return $this->hasMany(lead::class);
  }
    public  function campaign(){
    return $this->hasMany(campaign::class);
  }
    public function profile(){
        return $this->hasOne(profile::class);
    }
      public  function template(){
    return $this->hasMany(template::class);
  }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new adminResetPasswordNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

