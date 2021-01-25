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
        //$this->middleware('auth');
    }
    // <<とりあえず日報作成でやりたい事を書いていきます>>
    /**
     * 日報一覧を表示する
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $reports = "";
        // table-> daily_reports
        // key-> 自分のID($id)
        // return -> 未承認の日報一覧

        $reports2 = "";
        // table-> daily_reports
        // key-> 自分のID($id)
        // return -> 未承認の日報一覧
        //ビューの動作確認用サンプルデータ作成
        $tagu = '日報';
        $title1 = '日報承認・確認';
        $title2 = '日報一覧';
        $err_msgs1 = ['2021-01-07 10:00', '作業報告', '未承認'];
        $err_msgs2 = ['2021-01-06 10:00', '作業報告', '承認'];
        $err_msgs3 = ['2021-01-05 10:00', '作業報告', '承認'];
        $css = 'dailylist.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('report.list', compact('tagu', 'title1', 'title2', 'err_msgs1', 'err_msgs2', 'err_msgs3', 'css', 'js'));
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
        $title = '日報登録';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'dailyreport.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('report.dailyreport', compact('title', 'err_msgs', 'css', 'js'));
    }

    /**
     * 日報登録の確認画面を表示
     * 
     * @return view
     */

    public function confirm(Request $request)
    {
        $tagu = '日報登録確認';
        $title = '日報登録確認';
        $err_msgs1 = 'エラー１-１';
        $err_msgs2 = 'エラー２-１';
        $err_msgs3 = 'エラー３-１';
        $err_msgs4 = 'エラー４-１';
        $err_msgs5 = 'エラー５-１';
        $css = 'dailyreport_confirm.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('report.confirm', compact('tagu', 'title', 'err_msgs1', 'err_msgs2', 'err_msgs3', 'err_msgs4', 'err_msgs5', 'css', 'js'));
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

        // // if (is_null($report)) {
        //     \Session::flash('err_msg', 'データがありません');
        //     return redirect(route('report.index'));
        // }
        //ビューの動作確認用サンプルデータ作成
        $tagu = '日報登録確認';
        $title = '日報登録確認';
        $err_msgs1 = 'エラー１-１';
        $err_msgs2 = 'エラー２-１';
        $err_msgs3 = 'エラー３-１';
        $err_msgs4 = 'エラー４-１';
        $err_msgs5 = 'エラー５-１';
        $css = 'dailyreport_confirm.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('report.confirm', compact('tagu', 'title', 'err_msgs1', 'err_msgs2', 'err_msgs3', 'err_msgs4', 'err_msgs5', 'css', 'js'));
    }

    /**
     * 日報の承認画面トップを表示
     * @return view
     */
    public function approve()
    {
        //ビューの動作確認用サンプルデータ作成
        $tagu = '日報承認';
        $title1 = '日報承認';
        $title2 = '日報一覧';
        $msgs1 = ['2021-01-07 10:00', '営業部一課', '山田太郎', '作業報告', '未承認'];
        $msgs2 = ['2021-01-06 10:00', '営業部二課', '田中治郎', '作業報告', '承認'];
        $msgs3 = ['2021-01-05 10:00', '総務部一課', '佐藤浩一', '作業報告', '未承認'];
        $msgs4 = ['2021-01-04 10:00', '総務部二課', '丸山幸子', '作業報告', '承認'];
        $msgs5 = ['2021-01-03 10:00', '総務部三課', '武田哲也', '作業報告', '承認'];
        $err_msgs1 = ['2021-01-07 10:00', '営業部一課', '山田太郎',  '作業報告', '未承認'];
        $err_msgs2 = ['2021-01-06 10:00', '営業部二課', '田中治郎', '作業報告', '承認'];
        $err_msgs3 = ['2021-01-05 10:00', '総務部一課', '佐藤浩一',  '作業報告', '承認'];
        $err_msgs4 = ['2021-01-04 10:00', '総務部二課', '丸山幸子', '作業報告', '承認'];
        $err_msgs5 = ['2021-01-03 10:00', '総務部三課', '武田哲也', '作業報告', '承認'];
        $css = 'dailylist.css';
        $js = 'common.js';

        //ビューを呼び出す
        return view('report.approve', compact('tagu', 'title1', 'title2', 'msgs1', 'msgs2', 'msgs3', 'msgs4', 'msgs5', 'err_msgs1', 'err_msgs2', 'err_msgs3', 'err_msgs4', 'err_msgs5', 'css', 'js'));
    }

    /**
     * 日報差戻しの編集フォームを表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $title = '日報編集';
        $err_msgs = ['エラー１', 'エラー２', 'エラー３'];
        $css = 'dailyreport.css';
        $js = 'common.js';

        return view('report.create', compact('title', 'err_msgs', 'css', 'js'));
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