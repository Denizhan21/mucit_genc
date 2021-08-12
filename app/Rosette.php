<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rosette extends Model
{
    protected $table = 'rosettes';
    protected $guarded = [];

    public function rosette_club() {
        return $this->belongsToMany('App\Club');
    }

    public function student() {
        return $this->hasMany('App\User','user_id');
    }
}
