<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'authority',
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

    public function authority() {
        return $this->authority;
    }

    public function id() {
        return $this->id;
    }

    public function name() {
        return $this->name;
    }

    public function project() {
        return $this->hasMany('App\Project','user_id','id');
    }

    public function comment() {
        return $this->hasMany('App\Comment','user_id','id');
    }

    public function user_club() {
        return $this->belongsToMany('App\Club');
    }

    public function school() {
        return $this->belongsTo('App\School','school');
    }

}
