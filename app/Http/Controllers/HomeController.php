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
        // ログイン後でないと閲覧出来ないようにミドルウェアを適用する
        $this->middleware('auth');
    }

    /**
     * メインメニューを表示する
     *
     * @param Request $request 
     * @return view [202]メインメニュー/機能選択画面
     */
    public function main(Request $request)
    {
        // システム管理者と職位コードを取得(未使用?)
        $sys_admin = Auth::user()->sys_admin;
        $pos_cd = Auth::user()->pos_cd;

        // viewに渡すblade用データ
        $title = 'メインメニュー';
        $css = 'home.css';

        // viewを呼び出す
        return view('home', compact('title', 'css'));
    }
}