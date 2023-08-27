<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
      public function index()
      {
            $data['studentAll'] = DB::table('students')->count();
            // $data['classesActive'] = DB::table('classes')->where('status', 0)->count();
            // $data['classesInActive'] = DB::table('classes')->where('status', 1)->count();
            return view('dashboard', $data);
      }
}