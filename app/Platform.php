<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'platforms';
    protected $guarded = [];

    public function platform_club() {
        return $this->belongsToMany('App\Club');
    }
}
