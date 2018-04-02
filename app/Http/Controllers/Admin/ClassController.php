<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

# Model
use App\Classs;
use App\User;
use App\Exam;

# Requests
use App\Http\Requests\ClassRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ExamRequest;

class ClassController extends Controller
{
    public function index()
    {
       return view('admin.class');
    }

    public function create(ClassRequest $request)
    {
      $class = new Classs($request->all());
      $class->save();

      return redirect()->route('admin.class.detail', $class);
    }

    public function update(ClassRequest $request, $id)
    {
      $class = Classs::find($id);
      $class->fill($request->all())->save();

      return redirect()->route('admin.class.detail', ['id' => $class->id]);
    }

    public function delete(Request $request)
    {
      Classs::find($request->id)->delete();

      return redirect()->route('admin.class');
    }

    public function data()
    {
      return Datatables::of(Classs::query())
      ->addIndexColumn()
      ->editColumn('text', function ($class) {
        return substr($class->text,0,60);
      })
      ->addColumn('detail', function ($class) {
        return '<a href="'.route('admin.class.detail', ['id' => $class->id]).'" class="btn btn-success btn-block btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>';
      })
      ->rawColumns(['detail'])
      ->make(true);
    }

    public function detail($id)
    {
      $class = Classs::find($id);
      return view('admin.class.detail',[
        'class' => $class,
        'total_user' => $class->users()->count()
      ]);
    }

    // User
    public function userCreate(UserRequest $request, $id)
    {
      $user = new User($request->all());
      $user->save();
      $user->class()->attach(['class_id' => $id],['created_at' => now()]);

      return redirect()->route('admin.class.detail', ['id' => $id]);
    }

    public function userData($id) # unused
    {
      return Datatables::of(
        User::query()
        ->whereNotIn('id', function($query) use ($id)
          {
            $query->select('user_id')->from('class_users')->where('class_id', '=', $id);
          }
        )
      )
      ->make(true);
    }

    public function userList($id)
    {
      return Datatables::of(Classs::find($id)->users())
      ->addIndexColumn()
      ->addColumn('detail', function ($user) {
        return '<a href="'.$user->user_id.'" class="btn btn-primary btn-xs btn-block"><i class="fa fa-user margin-r-5"></i>Detail</a>';
      })
      ->addColumn('remove', function ($user) {
        return '<button type="button" onclick="removeUser('.$user->id.')" class="btn btn-danger btn-block btn-xs"><i class="fa fa-trash margin-r-5"></i> Hapus</button>';
      })
      ->rawColumns(['detail', 'remove'])
      ->make(true);
    }


    // Exam
    public function exam($id)
    {
      return view('admin.class.detail.select.exam', ['id' => $id]);
    }

    public function examData($id)
    {
      return Datatables::of(
        Exam::query()
        ->whereNotIn('id', function($query) use ($id)
          {
            $query->select('exam_id')->from('class_exams')->where('class_id', '=', $id);
          }
        )
      )
      ->editColumn('name', function($exam){
        return $exam->name.' ('.round(abs(strtotime($exam->start_at) - strtotime($exam->stop_at)) / 60,2).' Menit)';
      })
      ->editColumn('start_at', function($exam){
        return date('H:i:s , d M Y', strtotime($exam->start_at));
      })
      ->editColumn('stop_at', function($exam){
        return date('H:i:s , d M Y', strtotime($exam->stop_at));
      })
      ->addColumn('select', function($exam){
        return '<button onclick="selectExam('.$exam->id.')" type="button" class="btn btn-primary btn-block btn-xs"><i class="fa fa-check margin-r-5"></i> Pilih</button>';
      })
      ->addColumn('questions', function($exam){
        return count($exam->questions).' Soal';
      })
      ->addColumn('change', function($exam){
        return '<button onclick="changeSchedule('.$exam->id.')" class="btn btn-warning btn-block btn-xs"><i class="fa fa-calendar margin-r-5"></i> Jadwal</button>';
      })
      ->rawColumns(['select', 'change'])
      ->make(true);
    }

    public function examSelect(Request $request, $id)
    {
      $class = Classs::find($id);
      $class->exams()->attach(['exam_id' => $request->id],['created_at' => now()]);
    }

    public function examList($id)
    {
      return Datatables::of(Classs::find($id)->exams())      
      ->editColumn('start_at', function($exam){
        return date('H:i:s , d M Y', strtotime($exam->start_at));
      })
      ->editColumn('stop_at', function($exam){
        return date('H:i:s , d M Y', strtotime($exam->stop_at));
      })
      ->addColumn('total_question', function($exam){
        return Exam::find($exam->exam_id)->questions()->count().' Soal';
      })
      ->addColumn('duration', function($exam)
      {
        return round(abs(strtotime($exam->start_at) - strtotime($exam->stop_at)) / 60,2).' Menit';
      })
      ->addColumn('remove', function($exam) use($id){
        return '<button onclick="remove('.$id.', '.$exam->exam_id.')" class="btn btn-danger btn-block btn-xs"><i class="glyphicon glyphicon-remove"></i> Urungkan</button>';
      })
      ->addIndexColumn()
      ->rawColumns(['remove'])
      ->make(true);
    }

    public function examRemove(Request $request)
    {
        Classs::find($request->id)->exams()->detach(['exam_id' => $request->exam_id]);
    }

    public function examChangeModal(Request $request, $id)
    {
      return view('admin.class.detail.select.exam.modalChange', [
        'exam' => Exam::find($request->id)->load('questions'),
        'id' => $id
      ]);
    }

    public function examChange(ExamRequest $request, $id)
    {
      $exam = Exam::find($request->id);
      $exam->fill($request->all())->save();

      $class = Classs::find($id);
      $class->exams()->attach(['exam_id' => $exam->id],['created_at' => now()]);
      
      return redirect()->route('admin.class.exam', ['id'=>$id]);
    }

}
