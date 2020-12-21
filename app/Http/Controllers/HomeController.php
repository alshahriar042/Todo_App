<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

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
      $user_id=Auth::id();

    $tasks=Task::where('user_id',$user_id)->get();
    //dd($tasks);
        return view('home',compact('tasks'));
    }
}
