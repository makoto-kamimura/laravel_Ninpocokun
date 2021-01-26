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
        // ログイン後でないと見れないように
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        $title = 'メインメニュー';
        $css = 'home.css';
        $js = 'common.js';
        $user = Auth::user();
        dd($user);
        return view('home', compact('title', 'css', 'js'));
    }
}