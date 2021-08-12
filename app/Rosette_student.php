<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rosette_student extends Model
{
    protected $table = 'rosette_students';
    protected $guarded = [];

    public function student() {
        return $this->belongsTo('App\User','user_id');
    }

    public function rosette() {
        return $this->belongsTo('App\Rosette','rosette_id');
    }
}
