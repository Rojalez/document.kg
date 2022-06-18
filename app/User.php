<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function answers()
    {
      return $this->hasMany('App\Models\Answer');
    }

    public function userdocuments()
    {
      return $this->hasMany('App\Models\Userdocument');
    }

    public function questions()
    {
      return $this->hasMany('App\Models\Question');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function npa()
    {
      return $this->belongsToMany('App\Models\Npa', 'npa_user');
    }

    public function documents()
    {
      return $this->belongsToMany('App\Models\Document', 'document_user');
    }
}
