<?php

namespace App\Http\Controllers;

use App\Models\Attendand;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AttendandController extends Controller
{
    public function index(Request $request){
        $attendand = DB::table('attendands')
        ->whereDate('attendands.created_at', '=', Carbon::today())
        ->join('students', 'students.id', 'attendands.student_id')
        ->select('attendands.*',
         'students.name as attendand_name')
        ->where('students.status', 1);;

        if($request->start_date && $request->end_date){
              $start_date = $request->start_date;
              $end_date = $request->end_date;
              $attendand = Attendand::whereDate('created_at','>=',$start_date)
                                ->whereDate('created_at','<=',$end_date);
          }
        
        $attendands = $attendand
        ->orderBy('id', 'desc')->paginate(5);
        $data['attendands'] = $attendands;
       
        return view('admins.attendands.index', $data);
      }

      public function create(){
        $data['students'] = DB::table('students')->where('status', 1)->get();
        return view('admins.attendands.create', $data);
    }

    public function save(Request $request){
        $attendand = new Attendand();
        $attendand->student_id = $request->student_id;
        $attendand->actions = $request->actions;
        if($attendand->save()){
              return redirect()->route('attendand.index')->with('success', 'Attendand created successfull.');
        }else{
              return redirect()->route('attendand.index')->with('error', 'Attendand Cannot created.');
        }
    }

    public function edit($id){
      $data['attendands'] = Attendand::find($id);
      return view('admins.attendands.edit', $data);
    }

    public function update(Request $request){
      $attendand = Attendand::find($request->id);
      $attendand->actions = $request->actions;
      if($attendand->save()){
            return redirect()->route('attendand.index')->with('success', 'Attendand created successfull.');
      }else{
            return redirect()->route('attendand.index')->with('error', 'Attendand Cannot created.');
      }
}

      public function delete($id){
            $attendand = Attendand::find($id);
            $attendand->actions = 0;
            if($attendand->save()){
                  return redirect()->route('attendand.index')->with('success', 'Attendand Deleted successfully.');
            }else{
                  return redirect()->back()->with('error', 'Attendand not delete!');
            }
      }

}