<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

# Model
use App\Question;
use App\Answer;

# Request
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function index()
    {
      return view('admin.question');
    }

    function data()
    {
      $question = Question::query();
      return Datatables::of($question)
      ->editColumn('text', function($question){ return substr($question->text,0,85); })
      ->addColumn('action1', function($question){
        return '<button id="'.$question->id.'" onclick="update(id)" class="btn btn-warning btn-xs btn-block"><i class="glyphicon glyphicon-edit"></i> Ubah</button>';
      })
      ->addColumn('action2', function($question){
        return '<button id="'.$question->id.'" onclick="detail(id)" class="btn btn-success btn-xs btn-block"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>';
      })
      ->rawColumns(['action1', 'action2'])
      ->make(true);
    }

    public function create(QuestionRequest $request)
    {
      $question = new Question;
      $question->text =  $request->text;
      if (!empty($request->picture)) {
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('img/questions'), $imageName);

        $question->picture = $imageName;
      }
      $question->save();

      $count = 1;
      foreach ($request->answer_text as $value) {

        $answer = new Answer;
        $answer->text = $value;

        if ($request->true==$count++) {
          $answer->true = 1;
        }

        $question->answers()->save($answer);
      }

      return redirect()->route('admin.question');
    }

    public function formUpdate(Request $request)
    {
      if ($request->ajax()) {
        return view('admin.question.modalUpdate', [
          'question' => Question::find($request->id),
          'answers' => Question::find($request->id)->answers,
          'ch' => ['A', 'B', 'C', 'D'],
          'count' => 0
        ]);
      }
    }

    public function update(QuestionRequest $request, $id)
    {

      $question = Question::find($id);
      $question->text =  $request->text;
      if (!empty($request->picture)) {
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('img/questions'), $imageName);

        $question->picture = $imageName;
      }
      $question->save();

      $count = 1;
      foreach ($request->answer_text as $value) {

        $answer = Answer::find($request->answer_id[$count-1]);
        $answer->text = $value;

        if ($request->true==$count++) {
          $answer->true = 1;
        }else {
          $answer->true = 0;
        }

        $answer->save();
      }

      return redirect()->route('admin.question');
    }

    public function detail(Request $request)
    {
      if ($request->ajax()) {

        return view('admin.question.modalDetail', [
          'question' => Question::find($request->id),
          'answers' => Question::find($request->id)->answers,
          'ch' => ['A', 'B', 'C', 'D'],
          'count' => 0
        ]);
      }
    }

    public function delete(Request $request)
    {
      Question::find($request->id)->delete();
    }
}
