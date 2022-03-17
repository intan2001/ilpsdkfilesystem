<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\Models\Record;
use \App\Models\Serahan;
use \App\Models\User;

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

        $data['countRecord'] =Record::count();
        $data['countSerahan'] = Serahan::count();
        $data['countUser'] = User::count();
        
        return view('home', compact('data'));
   
    }
}
