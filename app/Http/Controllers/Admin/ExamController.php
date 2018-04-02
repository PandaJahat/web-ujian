<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

# Model
use App\Exam;
use App\Question;

# Request
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
    public function index()
    {
      return view('admin.exam');
    }

    public function detail($id)
    {
      $exam = Exam::find($id);

      return view('admin.exam.detail', [
        'exam' => $exam,
        'total_questions' => $exam->questions()->count(),
        'id' => $id
      ]);
    }

    public function update(ExamRequest $request, $id)
    {
      $exam = Exam::find($id);

      $exam->fill($request->all())->save();

      return redirect()->route('admin.exam.detail', ['id' => $id]);
    }

    public function updateForm($id)
    {
      return view('admin.exam.update', ['exam' => Exam::find($id)]);
    }

    public function delete(Request $request)
    {
      Exam::find($request->id)->delete();

      return route('admin.exam');
    }

    public function data()
    {
      $exam = Exam::query();
      return Datatables::of($exam)
      ->editColumn('start_at', function($exam){
        return date('H:i:s , d M Y', strtotime($exam->start_at));
      })
      ->editColumn('stop_at', function($exam){
        return date('H:i:s , d M Y', strtotime($exam->stop_at));
      })
      ->addColumn('detail', function($exam){
        return '<a href="'.route('admin.exam.detail', ['id' => $exam->id]).'" class="btn btn-success btn-xs btn-block"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>';
      })
      ->rawColumns(['detail'])
      ->make(true);
    }

    public function create(ExamRequest $request)
    {
      $exam = new Exam($request->all());
      $exam->save();

      return redirect()->route('admin.exam.detail', ['id' => $exam->id]);
    }

    // Question

    public function question($id)
    {
      return view('admin.exam.detail.select.question', ['id' => $id]);
    }

    public function questionData($id)
    {
      $question = Question::query()->whereNotIn('id', function($query) use ($id) { $query->select('question_id')->from('exam_questions')->where('exam_id', '=', $id); });
      return Datatables::of($question)
      ->editColumn('text', function($question){ return substr($question->text,0,85); })
      ->addColumn('action1', function($question) use ($id){
        return '<button onclick="select(\''.$id.'\', \''.$question->id.'\')" class="btn btn-primary btn-block btn-xs"><i class="glyphicon glyphicon-ok"></i> Pilih</button>';
      })
      ->addColumn('action2', function($question){
        return '<button id="'.$question->id.'" onclick="detail(id)" class="btn btn-success btn-xs btn-block"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>';
      })
      ->rawColumns(['action1', 'action2'])
      ->make(true);
    }

    public function questionSelect(Request $request)
    {
      Exam::find($request->id)->questions()->attach(['question_id' => $request->question_id],['created_at' => now()]);
    }

    public function questionList($id)
    {
      $exam = Exam::find($id)->questions();
      return Datatables::of($exam)
      ->addIndexColumn()
      ->editColumn('text', function($exam){ return substr($exam->text,0,60); })
      ->addColumn('detail', function($exam){
        return '<button id="'.$exam->question_id.'" onclick="detail(id)" class="btn btn-success btn-xs btn-block"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>';
      })
      ->addColumn('remove', function($exam) use ($id){
        return '<button onclick="remove(\''.$id.'\', \''.$exam->question_id.'\')" class="btn btn-danger btn-xs btn-block"><i class="glyphicon glyphicon-remove"></i> Urungkan</button>';
      })
      ->rawColumns(['detail', 'remove'])
      ->make(true);
    }

    public function questionRemove(Request $request)
    {
      Exam::find($request->id)->questions()->detach(['question_id' => $request->question_id]);
    }

    // END Question
}
