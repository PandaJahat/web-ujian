<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
  protected $fillable = ['name', 'detail', 'base_score','start_at', 'stop_at'];  

  public function questions()
  {
      return $this->belongsToMany('App\Question', 'exam_questions');
  }

}
