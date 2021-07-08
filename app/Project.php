<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $guarded = [];



    public function club() {
        return $this->belongsTo('App\Club','club_id');
    }

    public function student() {
        return $this->belongsTo('App\User','user_id');
    }


}
