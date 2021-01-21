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
        // cd            | smallint(6) | NO   | PRI | NULL    |       |
        // | sei           | varchar(6)  | NO   |     | NULL    |       |
        // | mei           | varchar(10) | NO   |     | NULL    |       |
        // | sei_kana      | varchar(10) | NO   |     | NULL    |       |
        // | mei_kana      | varchar(20) | NO   |     | NULL    |       |
        // | dep_cd        | tinyint(4)  | NO   |     | NULL    |       |
        // | div_cd        | tinyint(4)  | NO   |     | NULL    |       |
        // | nyusha_date   | date        | NO   |     | NULL    |       |
        // | taishoku_date | date        | NO   |     | NULL    |       |
        // | password      | varchar(60) | NO   |     | NULL    |       |
        // | yaku_lv       | tinyint(4)  | NO   |     | NULL    |       |
        // | sys_admin     | tinyint(4)  | NO   |     | NULL    |       |
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
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
}