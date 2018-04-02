<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    protected $table = 'classes';

    protected $fillable = ['code', 'name', 'text'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'class_users', 'class_id', 'user_id');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'class_exams', 'class_id', 'exam_id');
    }
}
