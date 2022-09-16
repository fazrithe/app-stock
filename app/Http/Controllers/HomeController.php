<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        $auth = Auth::user()->roles->first()->name ;
        if($auth == 'Admin'){
            return view('home');
        }else{
            $data = [
                'login_date' => $request->session()->get('login_date'),
                'area'  => Auth::user()->area,
            ];
            return view('stock.index', compact('data'));
        }
    }
}
