<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main(Request $request)
    {
        $title = 'メインメニュー';
        $css = 'home.css';
        $js = 'common.js';

        if (!Auth::check()) {
            echo '未ログイン状態';
        }


        return view('home', compact('title', 'css', 'js'));
    }
}