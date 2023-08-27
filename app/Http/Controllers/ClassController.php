<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;
use Laravel\Ui\Presets\React;

class ClassController extends Controller
{
    public function index(Request $request){
      $class = DB::table('classes');

      if($request->keyword){
            $keyword = $request->keyword;
            $class->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            });
        }
      
      $clases = $class->orderBy('id', 'desc')->paginate(5);
      $data['classes'] = $clases;
      // DB::table('classes')->where('action', 1)->orderBy('id', 'desc')
      return view('admins.classes.index', $data);
    }


      public function create(){
            return view('admins.classes.create');
      }

      public function save(Request $request){
            $class = new Classes;
            $class->name = $request->name;
            $class->status = $request->status;
            if($class->save()){
                  return redirect()->route('class.index')->with('success', 'Class added successfull.');
            }else{
                  return redirect()->route('class.index')->with('error', 'Cannot add.');
            }
      }

      public function edit($id){
            $data['classes'] = Classes::find($id);
            return view('admins.classes.edit', $data);
      }

      public function update(Request $request){
            $class = Classes::find($request->id);
            $class->name = $request->name;
            $class->status = $request->status;
            if($class->save()){
                  return redirect()->route('class.index')->with('success', 'Class updated successfully.');
              }else{
                  return redirect()->back()->with('error', 'Class not updated!');
              }
      }

      public function delete($id){
            $class = Classes::find($id);
            $class->status = 0;
            if($class->save()){
                  return redirect()->route('class.index')->with('success', 'Class Deleted successfully.');
              }else{
                  return redirect()->back()->with('error', 'Class not delete!');
              }
      }

}