<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        // 社員コードを取得
        return 'cd';
    }

    // showLoginControllerをオーバーライドする
    public function showLoginForm(Request $request)
    {
        //ビューの動作確認用サンプルデータ作成
        $title = 'ログインページ';
        // $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'base.css';
        $js = 'common.js';


        //cokkieがセットされていなければ値を取得
        if (isset($request->cookie)) {
            $get_cookie = array(
                'department' => $request->cookie('departments'),
                'division' => $request->cookie('divisions'),
                'user_cd' => $request->cookie('name')
            );

            // ビューを呼び出す(クッキーあり)
            return view('Auth.login', compact('get_cookie', 'title', 'css', 'js'));
        } else {
            // ビューを呼び出す(クッキーなし)
            return view('Auth.login', compact('title', 'css', 'js'));
        }
    }

    // ログイン後の遷移先を指定
    public function redirectPath()
    {
        //セッションにsys_adminとpos_cdを保存
        return '/';
    }
}