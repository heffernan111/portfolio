<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = DB::table('pages')->get();
        $educations = DB::table('education')->get();
        $experiences = DB::table('experience')->get();
        $skills = DB::table('skills')->get();
        $tutorials = DB::table('tutorials')->get();


        return view('welcome',[ 'pages' => $pages, 'educations' => $educations, 'experiences' => $experiences, 'skills' => $skills,'tutorials' => $tutorials ]);
    }
}
