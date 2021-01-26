<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

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
        //
    }

    /**
     *　ユーザー登録画面を表示する
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store()
    {
        $data = \Session::get('user', 'データが存在しない');;
        // $request->session()->forget('user');

        // トランザクション処理
        \DB::beginTransaction();
        try {
            $max_cd = DB::table('users')->max('cd');
            User::create([
                // 固定値を直すこと
                'cd' => $max_cd + 1,
                'sei' => $data['sei'],
                'mei' => $data['mei'],
                'sei_kana' => $data['sei_kana'],
                'mei_kana' => $data['mei_kana'],
                'dep_cd' => $data['dep_cd'],
                'div_cd' => $data['div_cd'],
                'taishoku_date' => $data['taishoku_date'],
                'password' => Hash::make($data['password']),
                'pos_cd' => $data['pos_cd'],
                'sys_admin' => $data['sys_admin'],
            ]);
            \DB::commit();
        } catch (\Throwable $th) {
            // 登録失敗の場合はロールバック
            \DB::rollback;
            abort(500);
        }
        \Session::flash('err_msg', '登録しました');
        return redirect(route('user.complete'));
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
        if (!empty($errors)) {
            dd($errors);
        }

        //ビューを呼び出す
        return view('auth.register', compact('title', 'err_msgs', 'css', 'js'));
    }

    /**
     * ユーザー登録確認画面を表示する
     * @param
     * @return view
     */

    public function confirm(UserRequest $request)
    {
        $user = $request->input();
        \Session::put('user', $user);
        $title = 'ユーザー登録';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'usertouroku.css';
        $js = 'common.js';
        return view('auth.confirm', compact('report', 'title', 'err_msgs', 'css', 'js'));
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

    public function complete(Request $request)
    {
        //ビューの動作確認用サンプルデータ作成
        $tagu = 'ユーザー登録完了';
        $css = 'usertouroku.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('auth.complete', compact('tagu', 'css', 'js'));
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