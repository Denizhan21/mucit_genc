<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club_user extends Model
{
    protected $table = 'club_users';
    protected $guarded = [];

    public function student() {
        return $this->belongsTo('App\User','user_id');
    }

    public function clubs() {
        return $this->belongsTo('App\Club','club_id');
    }
}
