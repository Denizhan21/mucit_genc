<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';
    protected $guarded = [];


    public function project() {
        return $this->hasMany('App\Project','club_id');
    }

    public function club_user() {
        return $this->belongsToMany('App\User');
    }

    public function teachers() {
        return $this->belongsTo('App\User','teacher');
    }

    public function schools() {
        return $this->belongsTo('App\School','school_id');
    }
}
