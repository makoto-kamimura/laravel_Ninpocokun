<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // バリデーションの内容は要確認
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cd' => ['required'],
            'sei' => ['required'],
            'mei' => ['required'],
            'sei_kana' => ['required'],
            'mei_kana' => ['required'],
            'dep_cd' => ['required'],
            'div_cd' => ['required'],
            'nyusha_date' => ['required'],
            'taishoku_date' => ['required'],
            'password' => ['required'],
            'yaku_lv' => ['required'],
            'sys_admin' => ['required'],
        ]);
    }

    /**
     *　ユーザー登録画面を表示する
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        $data = $request->session()->all();
        $request->session()->forget('user');
        dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * ユーザー登録画面を表示する
     * @return view
     */
    public function create()
    {
        //ビューの動作確認用サンプルデータ作成
        $title = 'ユーザー登録';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'usertouroku.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('auth.register', compact('title', 'err_msgs', 'css', 'js'));
    }

    /**
     * ユーザー登録確認画面を表示する
     * @param
     * @return view
     */

    public function confirm(Request $request)
    {
        $user = $_POST;
        validator($user);
        $request->session()->push('user', $user);
        $title = 'ユーザー登録';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'usertouroku.css';
        $js = 'common.js';
        return view('auth.confirm', compact('user', 'title', 'err_msgs', 'css', 'js'));
    }

    /**
     * ユーザー編集画面を表示する
     * @param
     * @return view
     */
    public function edit($id)
    {
        $title = 'メインメニュー';
        $css = 'base.css';
        $js = 'common.js';
        return view('auth.register', compact('title', 'css', 'js'));
    }
    /**
     * ユーザー編集を実行する
     * 
     */
    public function update()
    {
        return redirect('complete');
    }

    /**
     * ユーザー登録完了画面を表示する
     * 
     * @return view
     */

    public function complete()
    {
        return view('auth.complete');
    }

    /**
     * ユーザー管理画面を表示する
     */

    public function admin()
    {
        //ビューの動作確認用サンプルデータ作成
        $tagu = 'ユーザー管理';
        //$title1 = 'ユーザー登録';
        $title2 = 'ユーザーリスト';
        $msgs1 = ['0001', '営業部一課', '山田太郎', '20-01-01', '○'];
        $msgs2 = ['0002', '営業部二課', '田中治郎', '20-01-01', '×'];
        $msgs3 = ['0003', '総務部一課', '佐藤浩一', '20-01-01', '×'];
        $msgs4 = ['0004', '総務部二課', '丸山幸子', '20-01-01', '×'];
        $msgs5 = ['0005', '総務部三課', '武田哲也', '20-01-01', '×'];
        $css = 'user.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('auth.admin', compact('tagu', 'title2', 'msgs1', 'msgs2', 'msgs3', 'msgs4', 'msgs5', 'css', 'js'));
    }
}