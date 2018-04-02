<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

# Model
use App\User;
use App\Exam;

class ExamController extends Controller
{
    public function index()
    {
      return view('user.exam', [
        'user' => Auth::user()->load('class', 'class.exams', 'class.exams.questions'),
        'counter' => 0
      ]);
    }

    public function detail(Request $request)
    {
      $exam = Exam::find($request->id);
      if ($this->checkDate($exam)) {

        return view('user.exam.detail', [
          'exam' => $exam,
          'total_question' => count($exam->questions)
        ]);
      }
    }

    public function show($id)
    {
      $exam = Exam::find($id)->load('questions');
      if (!empty($exam)) {

        if ($this->checkDate($exam)) {

          return view('user.exam.show', [
            'exam' => $exam,
            'counter' => 0
          ]);
        }
      }
    }

    private function checkDate(Exam $exam)
    {
      if (!empty($exam)) {
        $now = strtotime('now');
        $start_at = strtotime($exam->start_at);
        $stop_at = strtotime($exam->stop_at);

        if ($now > $start_at && $now < $stop_at) {
          return true;
        }
      }

      return false;
    }
}
