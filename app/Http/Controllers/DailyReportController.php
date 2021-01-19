<?php

namespace App\Http\Controllers;

use App\Daily_report;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function __construct()
    {
        // 日報表示の画面は基本的にLaravel標準の
        // Authを通すのが一番簡単だと思います
        $this->middleware('auth');
    }
    // <<とりあえず日報作成でやりたい事を書いていきます>>
    /**
     * 日報一覧を表示する
     * 
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $reports = "";
        // table-> daily_reports
        // key-> 自分のID($id)
        // return -> 未承認の日報一覧

        $reports2 = "";
        // table-> daily_reports
        // key-> 自分のID($id)
        // return -> 未承認の日報一覧
        return view('list', compact('reports', 'reports2'));
    }

    /**
     * 日報登録フォームを表示
     * 
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //ビューの動作確認用サンプルデータ作成
        $title = '日報一覧ページ';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'base.css';
        $js = 'common.js';


        //ビューを呼び出す
        return view('dailyreport', compact('title', 'err_msgs', 'css', 'js'));
    }

    /**
     * 日報登録の確認画面を表示
     * 
     * @return view
     */

    public function confirm(Request $request)
    {
        return view('auth.confirm');
    }

    /**
     * 日報登録を実行
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $inputs = $request->all();
        // \DB::beginTransaction();
        // try {
        //     Daily_report::create($inputs);
        //     \DB::commit();

        //     //code...
        // } catch (\Throwable $e) {
        //     \DB::rollback;
        //     abort(500);
        // }
        // \Session::flash('err_msg', '日報を登録しました');
        // return redirect(route('reports'));

    }

    /**
     * 日報の個別記事を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // $report = Daily_report::find($id);

        // if (is_null($report)) {
        //     \Session::flash('err_msg', 'データがありません');
        //     return redirect(route('reports'));
        // }
        // return view('report.detail', ['report' => $report]);
    }

    /**
     * 日報差戻しの編集フォームを表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * 日報差戻しの編集を実行
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 日報を削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (empty($id)) {
        //     \Session::flash('err_msg', 'データがありません');
        //     return redirect(route(''));
        // }
        // try {
        //     Report::destroy($id);
        // } catch (\Throwable $e) {
        //     abort(500);
        // }
        // \Session::flash('err_msg', '記事を削除しました');
        // return redirect(route(''));
    }
}