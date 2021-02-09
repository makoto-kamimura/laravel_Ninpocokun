<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
     *　ユーザー登録を実行する
     *
     * @param  Request $request
     * @return view [209]ユーザー情報登録完了画面
     */
    protected function store(Request $request)
    {
        // 入力データを受け取る
        $input = $request->input();
        if (isset($input['cd'])) {
            \Session::put('cd', $input['cd']);
        }

        // [修正する]が押下された場合は入力画面にリダイレクトする
        if ($input['submit'] == '修正する') {
            return redirect('register')->withInput();
        } else {
            $data = \Session::get('user', 'データが存在しない');

            // 編集画面遷移時に登録した社員コードの取得を試行
            $data['cd'] = \Session::get('cd');
            \Session::forget('cd');

            // divが無い場合に0をセット
            if (!isset($data['division'])) {
                $data['division'] = 0;
            }

            // 社員番号の有無でCREATE UPDATEを判定する
            if (!isset($data['cd'])) {
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
                        'dep_cd' => $data['department'],
                        'div_cd' => $data['division'],
                        'taishoku_date' => $data['taishoku_date'],
                        'password' => Hash::make($data['password']),
                        'pos_cd' => $data['position'],
                        'sys_admin' => $data['sys_admin'],
                    ]);
                    \DB::commit();
                } catch (\Throwable $e) {
                    dd($e);
                    // 登録失敗の場合はロールバック
                    \DB::rollback();
                    abort(500);
                }
            } else {
                //日報noがある場合は編集を実行
                \DB::beginTransaction();
                try {
                    $user = User::find($data['cd']);
                    $user->fill([
                        'sei' => $data['sei'],
                        'mei' => $data['mei'],
                        'sei_kana' => $data['sei_kana'],
                        'mei_kana' => $data['mei_kana'],
                        'dep_cd' => $data['department'],
                        'div_cd' => $data['division'],
                        'taishoku_date' => $data['taishoku_date'],
                        'password' => Hash::make($data['password']),
                        'pos_cd' => $data['position'],
                        'sys_admin' => $data['sys_admin'],
                    ]);
                    $user->save();
                    \DB::commit();
                } catch (\Throwable $th) {
                    \DB::rollback();
                    abort(500);
                }
            }
            // viewを呼び出す
            return redirect(route('user.complete'));
        }
    }

    /**
     * ユーザー登録画面を表示する
     * 
     * @return view [207]ユーザー新規登録画面
     */
    public function create()
    {
        // 部課情報を取得
        $deps = DB::table('departments')->get();
        $pos = DB::table('positions')->get();
        if (old('division') !== null && old('department') !== null) {
            $divs = DB::table('divisions')->where('dep_cd', old('department'))->select('cd', 'name')->get();
        } else {
            $divs = null;
        }

        // viewに渡すblade用データ
        $title = 'ユーザー登録';
        $css = 'usertouroku.css';
        $user = (object)[
            'sei' => '',
            'mei' => '',
            'sei_kana' => '',
            'mei_kana' => '',
            'dep_cd' => '',
            'div_cd' => '',
            'taishoku_date' => '',
            'password' => '',
            'pos_cd' => '',
            'sys_admin' => '',
        ];

        // 新規作成時にセッション上のcdを取得しないようにする
        if (old('cd') !== null) {
            $cd = \Session::get('cd');
        } else {
            $cd = null;
        }
        \Session::forget('cd');

        // viewを呼び出す
        return view('auth.register', compact('user', 'cd', 'divs', 'deps', 'pos', 'title', 'css'));
    }

    /**
     * ユーザー登録確認画面を表示する
     * @param UserRequest $request
     * @return view [208]ユーザー登録確認画面
     */

    public function confirm(UserRequest $request)
    {
        // cdを取得
        $cd = \Session::get('cd');
        \Session::forget('cd');

        // 入力データを取得する
        $user = $request->input();

        // 無ければRequestから$userに入力データを取得する
        if (isset($cd)) { // = 編集モード
            $user['cd'];
        }

        // システム管理者ではない場合に0を設定する
        if (!isset($user['sys_admin'])) {
            $user['sys_admin'] = 0;
        }

        $de = "";
        $di = "";
        $po = "";
        // 部課コードを名称に変換する
        if (isset($user['department'])) {
            $dep = DB::table('departments')->where('cd', $user['department'])
                ->select('name')->first();
            foreach ($dep as $de) {
            }
        }
        if (isset($user['division'])) {
            $div = DB::table('divisions')->where('cd', $user['division'])
                ->select('name')->first();
            foreach ($div as $di) {
            }
        }
        // 職位コードを名称に変換する
        if (isset($user['position'])) {
            $pos = DB::table('positions')->where('cd', $user['position'])
                ->select('name')->first();
            foreach ($pos as $po) {
            }
        }
        \Session::put('user', $user);

        // viewに渡すblade用データ
        $title = 'ユーザー登録';
        $css = 'usertouroku.css';

        // viewを呼び出す
        return view('auth.confirm', compact('de', 'di', 'po', 'user', 'title', 'css'));
    }

    /**
     * ユーザー編集画面を表示する
     * @param int $id 社員id
     * @return view [207]ユーザー変更画面
     */
    public function edit($id)
    {
        // 部課情報を取得
        $deps = DB::table('departments')->get();
        $pos = DB::table('positions')->get();

        // ユーザー情報を取得
        $user = User::find($id);
        if (is_null($user)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('user.admin'));
        }
        $divs = DB::table('divisions')->where('dep_cd', $user->dep_cd)->select('cd', 'name')->get();

        // cdを取得
        $cd = $id;
        //Sessionに社員コードを登録
        \Session::put('cd', $user->cd);

        // viewに渡すblade用データ
        $title = 'ユーザー編集';
        $css = 'usertouroku.css';

        // viewを呼び出す
        return view('auth.register', compact('user', 'cd', 'deps', 'pos', 'divs', 'title', 'css'));
    }

    /**
     * ユーザー登録完了画面を表示する
     *
     * @param Request $request
     * @return view [209]ユーザー登録完了画面
     */

    public function complete(Request $request)
    {
        // viewに渡すblade用データ
        $tagu = 'ユーザー登録完了';
        $css = 'usertouroku.css';

        // viewを呼び出す
        return view('auth.complete', compact('tagu', 'css'));
    }

    /**
     * ユーザー管理画面を表示する
     *
     * @return view [216]ユーザー管理画面
     */

    public function admin()
    {
        //社員の一覧を取得する
        $table = DB::table('users');
        $users = DB::select(DB::raw(
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

        // viewに渡すblade用データ
        $tagu = 'ユーザー管理';
        $title2 = 'ユーザー管理';
        $css = 'user.css';

        // viewを呼び出す
        return view('auth.admin', compact('users', 'tagu', 'title2', 'css'));
    }
}