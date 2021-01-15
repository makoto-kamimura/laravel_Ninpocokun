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
    return view('welcome');
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

Route::get('/home', 'HomeController@index')->name('home');