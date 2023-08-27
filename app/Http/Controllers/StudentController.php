<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
  public function index(Request $request){
    // $student = Student::where('status', 1);
    
    $student = DB::table('students')
    ->join('classes', 'classes.id', 'students.class_id')
    ->select('students.*',
     'classes.name as class_name')
    ->where('classes.status',1);

    if($request->keyword){
          $keyword = $request->keyword;
          $student->where(function ($query) use ($keyword) {
              $query->where('students.name', 'like', "%{$keyword}%");
          });
      }
    
    $students = $student->orderBy('id', 'desc')->paginate(5);
    $data['students'] = $students;
    // DB::table('classes')->where('action', 1)->orderBy('id', 'desc')
    return view('admins.students.index', $data);
  }

  public function create(){
    $data['classes'] = DB::table('classes')->where('status', 1)->get();
    return view('admins.students.create', $data);
}

public function save(Request $request){
    $student = new Student();
    $student->name = $request->name;
    $student->class_id = $request->class_id;
    $student->gender = $request->gender;
    $student->status = $request->status;
    if($student->save()){
          return redirect()->route('student.index')->with('success', 'Student added successfull.');
    }else{
          return redirect()->route('student.index')->with('error', 'Cannot add.');
    }
}

    public function edit($id){
      $data['students'] = Student::find($id);
      return view('admins.students.edit', $data);
    }

    public function update(Request $request){
      $student = Student::find($request->id);
      $student->name = $request->name;
      $student->class_id = $request->class_id;
      $student->gender = $request->gender;
      $student->status = $request->status;
      if($student->save()){
            return redirect()->route('student.index')->with('success', 'Student has updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Student is not updated!');
        }
}

      public function delete($id){
        $student = Student::find($id);
        $student->status = 0;
        if($student->save()){
              return redirect()->route('student.index')->with('success', 'Student Deleted successfully.');
          }else{
              return redirect()->back()->with('error', 'Student not delete!');
          }
      }


}