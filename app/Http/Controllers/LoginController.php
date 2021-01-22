<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        //ビューの動作確認用サンプルデータ作成
        $title = 'ログイン';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'base.css';
        $js = 'common.js';


        //ビューを呼び出す
        return view('login', compact('title', 'err_msgs', 'css', 'js'));
    }
}


Route::get('/', function () {
    return view('welcome');
});