<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher_comment extends Model
{
    protected $table = 'teacher_comments';
    protected $guarded = [];

    public function teachers() {
        return $this->belongsTo('App\User','user_id');
    }

    public function projects() {
        return $this->belongsTo('App\Project','project_id');
    }
}
