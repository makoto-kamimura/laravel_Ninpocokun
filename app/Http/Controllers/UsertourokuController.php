<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

class UsertourokuController extends Controller
{
    public function usertouroku()
    {
        //ビューの動作確認用サンプルデータ作成
        $title = 'ユーザー登録';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'usertouroku.css';
        $js = 'common.js';


        //ビューを呼び出す
        return view('usertouroku', compact('title', 'err_msgs', 'css', 'js'));
    }

    public function userConfirm(Request $request)
    {

        $user = $_POST;
        validator($user);
        $request->session()->push('user', $user);
        $title = 'ユーザー登録';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'usertouroku.css';
        $js = 'common.js';
        return view('user_confirm', compact('user', 'title', 'err_msgs', 'css', 'js'));
    }
}