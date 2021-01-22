<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // //ビューの動作確認用サンプルデータ作成
    $title = 'ログインページ';
    // $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
    $css = 'base.css';
    $js = 'common.js';


    //ビューを呼び出す
    return view('Auth.login', compact('title', 'css', 'js'));
});

// // <<日報管理関係ルーティング>>
Route::resource('report', 'DailyReportController');
// 一覧を表示 => index
// 登録画面を表示 => create
// 登録確認画面を表示 -> confirm
Route::post('report/confirm', 'DailyReportController@confirm')->name('confirm');
// 登録実行 => store
// 差戻しの編集画面を表示 => edit
// 差戻しの編集を実行 => update
// 削除する => delete
// 個別の記事を表示 => show

// <<ユーザー管理関係ルーティング>>
Auth::routes();
Route::post('auth/confirm', 'RegisterController@confirm')->name('auth_confirm');
Route::post('auth/register', 'Auth\RegisterController@create')->name('create');

Route::get('/home', 'HomeController@index')->name('home');