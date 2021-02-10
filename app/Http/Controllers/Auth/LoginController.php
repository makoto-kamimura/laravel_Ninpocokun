<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    // 認証columnを社員コードにするように変更する
    public function username()
    {
        // 社員コードを返す
        return 'cd';
    }

    // showLoginControllerをオーバーライドする
    public function showLoginForm(Request $request)
    {
        // 部課情報を取得
        $deps = DB::table('departments')->get();

        // viewに渡すblade用データ
        $title = 'ログインページ';
        $css = 'base.css';

        // cokkieがセットされていなければ値を取得(未使用?)
        if (\Cookie::has('name')) {
            $get_cookie = [
                'department' => $request->cookie('departments'),
                'division' => $request->cookie('divisions'),
                'user_cd' => $request->cookie('name')
            ];

            // viewを呼び出す(cookieあり)
            return view('Auth.login', compact('deps', 'get_cookie', 'title', 'css'));
        } else {
            // viewを呼び出す(cookieなし)
            return view('Auth.login', compact('deps', 'title', 'css'));
        }
    }

    // ログイン後の遷移先を指定する
    public function redirectPath()
    {
        return '/';
    }

    // 同一アカウントへの多重ログインを禁止する
    protected function authenticated(Request $request, $user)
    {
        Auth::logoutOtherDevices($request->input('password'));
    }
}