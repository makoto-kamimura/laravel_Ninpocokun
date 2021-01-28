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
        $this->middleware('auth');
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

        // トランザクション処理
        \DB::beginTransaction();
        try {
            $max_cd = DB::table('users')->max('cd');
            User::create([
                'cd' => $max_cd + 1,
                'sei' => $data['sei'],
                'mei' => $data['mei'],
                'sei_kana' => $data['sei_kana'],
                'mei_kana' => $data['mei_kana'],
                'dep_cd' => 10, // $data['dep_cd'],
                'div_cd' => 20, // $data['div_cd'],
                'taishoku_date' => $data['taishoku_date'],
                'password' => Hash::make($data['password']),
                'pos_cd' => 5, // $data['pos_cd'],
                'sys_admin' => 1, // $data['sys_admin'],
            ]);
            \DB::commit();
        } catch (\Throwable $e) {
            dd($e);
            // 登録失敗の場合はロールバック
            \DB::rollback();
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
        //社員の一覧を取得する
        $table = DB::table('users');
        $reports = DB::select(DB::raw(
            "SELECT vui.user_cd,
        lpad(vui.user_cd, 5, '0') user_disp_cd,
        vui.dep_div_name,
        vui.user_name,
        vui.taishoku_date,
        CASE 
            WHEN vui.sys_admin = 1 THEN '○'
            ELSE '×'
        END AS sys_admin
        FROM v_user_info vui
        ORDER BY vui.user_cd"
        ));
        dd($reports);
        //ビュー
        $tagu = 'ユーザー管理';
        //$title1 = 'ユーザー登録';
        $title2 = 'ユーザーリスト';
        $css = 'user.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('auth.admin', compact('reports', 'tagu', 'title2', 'css', 'js'));
    }
}