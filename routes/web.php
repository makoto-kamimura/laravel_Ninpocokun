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
// // 一覧を表示
// Route::get();

// // 登録画面を表示
// Route::get();

// // 登録確認画面を表示
// Route::post();

// // 登録実行
// Route::post();

// // 差戻しの編集画面を表示
// Route::get();

// // 削除する
// Route::post();

// // 個別の記事を表示
// Route::get();

// <<ユーザー管理関係ルーティング>>