<?php

namespace App\Http\Controllers;

use App\Daily_report;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class DailyReportController extends Controller
{
    public function __construct()
    {
        // 日報表示の画面は基本的にLaravel標準の
        // Authを通すのが一番簡単だと思います
        $this->middleware('auth');
    }

    // <<とりあえず日報作成でやりたい事を書いていきます>>

    // 部下の投稿かどうかを判定する
    public static function isBuka($data)
    {
        //ログインIDを取得
        $current = Auth::id();
        // ログイン者と記事内IDを比較
        if (isset($data->post_user_cd)) {
            if ($current == $data->auth_user_cd) {
                return true; // 上司です
            } elseif ($current == $data->post_user_cd) {
                return false; // 部下です
            } else {
                // 当該日報に関係ない第三者に直接リクエストされた場合の対応
                return null;
            }
        } else {
            // 存在しない日報idをリクエストされた場合の対応
            return null;
        }
    }

    /**
     * 日報一覧を表示する
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //未承認の自分の日報を取得する
        $current = Auth::id();
        $table = DB::table('daily_reports');
        $reports = DB::select(DB::raw("SELECT dr.no, dr.created_at,LEFT(dr.sagyou,12) sagyou, st.name
            FROM daily_reports dr
            LEFT JOIN v_user_info vui
            ON dr.post_user_cd = vui.user_cd
            LEFT JOIN statuses st
            ON dr.status = st.cd
            WHERE dr.status < 1
            AND dr.post_user_cd = :cd
            ORDER BY dr.no"), ['cd' => $current]);

        // 承認済みの自分の日報を取得する
        $table = DB::table('daily_reports');
        $reports2 = DB::select(DB::raw(
            "SELECT dr.no, dr.created_at,LEFT(dr.sagyou,12) sagyou, st.name
            FROM daily_reports dr
            LEFT JOIN v_user_info vui
            ON dr.post_user_cd = vui.user_cd
            LEFT JOIN statuses st
            ON dr.status = st.cd
            WHERE dr.status = 1
            AND dr.post_user_cd = :cd
            ORDER BY dr.no"
        ), ['cd' => $current]);

        $tagu = '日報';
        $title1 = '日報承認・確認';
        $title2 = '日報一覧';
        $css = 'dailylist.css';

        //ビューを呼び出す
        return view('report.list', compact('reports', 'reports2', 'tagu', 'title1', 'title2',  'css'));
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
        $report = (object)[
            'sagyou' => '',
            'shintyoku' => '',
            'zansagyou' => '',
            'hikitsugi' => '',
            'comment' => '',
        ];
        \Session::forget('post_cd');
        \Session::forget('post_no');

        //ビューを呼び出す
        return view('report.dailyreport', compact('report', 'title', 'err_msgs', 'css'));
    }

    /**
     * 日報登録の確認画面を表示
     * 
     * @return view
     */

    public function confirm(ReportRequest $request)
    {
        $report = $request->input();
        \Session::put('report', $report);

        if (!isset($report['comment'])) {
            $report['comment'] = "";
        }
        $report = (object)[
            'sagyou' => $report['sagyou'],
            'shintyoku' => $report['shintyoku'],
            'zansagyou' => $report['zansagyou'],
            'hikitsugi' => $report['hikitsugi'],
            'comment' => $report['comment'],
            'post_user_cd' => \Session::get('post_cd'),
            'auth_user_cd' => \Session::get('auth_cd'),
            'status' => -1,
        ];
        $tagu = '日報登録確認';
        $title = '日報登録確認';
        $is_auth = DailyReportController::isBuka($report);

        $css = 'dailyreport_confirm.css';

        //ビューを呼び出す
        return view('report.confirm', compact('report', 'tagu', 'title', 'css', 'is_auth'));
    }

    /**
     * 日報登録を実行
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store()
    {
        $data = \Session::get('report', 'データが存在しません');
        $data['post_cd'] = \Session::get('post_cd');
        \Session::forget('post_cd');
        if (isset($data['post_cd'])) {
            $data['no'] =  \Session::get('post_no');
            \Session::forget('post_no');
        }

        // 日報noの存在でinsert update分岐
        if (!isset($data['no'])) {
            //日報noが無ければ新規登録
            \DB::beginTransaction();

            try {
                $max_no = DB::table('daily_reports')->max('no');
                $current = Auth::id();
                $joushi = DB::select('SELECT f_get_joushi(:cd) joushi', ['cd' => $current]);
                foreach ($joushi as $jo) {
                    $jocd = $jo->joushi;
                }

                Daily_report::create([
                    'no' => $max_no + 1,
                    'post_user_cd' => $current,
                    'auth_user_cd' => $jocd,
                    'sagyou' => $data['sagyou'],
                    'shintyoku' => $data['shintyoku'],
                    'zansagyou' => $data['zansagyou'],
                    'hikitsugi' => $data['hikitsugi'],
                    'status' => 0,
                ]);
                \DB::commit();
            } catch (\Throwable $th) {
                // 登録失敗の場合はロールバック
                \DB::rollback();
                dd($th);
                abort(500);
            }
        } else {
            //日報noがある場合は編集を実行
            \DB::beginTransaction();
            try {
                $report = Daily_report::find($data['no']);
                $report->fill([
                    'sagyou' => $data['sagyou'],
                    'shintyoku' => $data['shintyoku'],
                    'zansagyou' => $data['zansagyou'],
                    'hikitsugi' => $data['hikitsugi'],
                ]);
                $report->save();
                \DB::commit();
            } catch (\Throwable $th) {
                \DB::rollback();
                abort(500);
            }
        }
        \Session::flash('err_msg', '日報を登録しました');
        return redirect(route('report.complete'));
    }

    /**
     * 日報の個別記事を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $report = Daily_report::find($id);

        if (is_null($report)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('report.index'));
        }

        // セッションに記事noを登録
        \Session::put('post_no', $report->no);


        //ビューの動作確認用サンプルデータ作成
        $tagu = '日報登録確認';
        $title = '日報登録確認';
        $css = 'dailyreport_confirm.css';
        $is_auth = DailyReportController::isBuka($report);

        //ビューを呼び出す
        return view('report.confirm', compact('report', 'tagu', 'title', 'css', 'is_auth'));
    }

    /**
     * 日報の承認画面トップを表示
     * @return view
     */
    public function approve()
    {
        // 承認待機状態の部下の日報を取得する
        $current = Auth::id();
        $table = DB::table('daily_reports');
        $reports = DB::select(DB::raw("SELECT dr.no, dr.created_at, vui.dep_div_name, vui.user_name, 
        LEFT(dr.sagyou,12) sagyou, st.name stat_name
        FROM daily_reports dr
        LEFT JOIN v_user_info vui
        ON dr.post_user_cd = vui.user_cd
        LEFT JOIN statuses st
        ON dr.status = st.cd
        WHERE dr.status < 1
        AND dr.auth_user_cd = :cd
        ORDER BY dr.no"), ['cd' => $current]);


        // 承認済の部下の日報を取得する
        $table = DB::table('daily_reports');
        $reports2 = DB::select(DB::raw("SELECT dr.no, dr.created_at, vui.dep_div_name, vui.user_name, 
        LEFT(dr.sagyou,12) sagyou, st.name stat_name
        FROM daily_reports dr
        LEFT JOIN v_user_info vui
        ON dr.post_user_cd = vui.user_cd
        LEFT JOIN statuses st
        ON dr.status = st.cd
        WHERE dr.status = 1
        AND dr.auth_user_cd = :cd
        ORDER BY dr.no"), ['cd' => $current]);

        //ビューの動作確認用サンプルデータ作成
        $tagu = '日報承認';
        $title1 = '日報承認';
        $title2 = '日報一覧';
        $css = 'dailylist.css';

        //ビューを呼び出す
        return view('report.approve', compact('reports', 'reports2', 'tagu', 'title1', 'title2', 'css'));
    }

    /**
     * 日報の承認/差戻しを実行
     */
    public function remand(ReportRequest $request)
    {
        //コメントを取得
        $input = $request->input();
        $post_no =  \Session::get('post_no');
        if ($input['submit'] == "承認する") {
            \DB::beginTransaction();
            try {
                $report = Daily_report::find($post_no); ///記事番号);
                $report->fill([
                    'comment' => $input['comment'],
                    // 承認ステータスへ変更　0=>1
                    'status' => 1,
                ]);
                $report->save();
                \DB::commit();
            } catch (\Throwable $th) {
                \DB::rollback();
                dd($th);
                abort(500);
            }
        } else {
            \DB::beginTransaction();
            try {
                $report = Daily_report::find($post_no); ///記事番号);
                $report->fill([
                    'comment' => $input['comment'],
                    // 差戻しステータスへ変更 0=>-1
                    'status' => -1,
                ]);
                $report->save();
                \DB::commit();
            } catch (\Throwable $th) {
                \DB::rollback();
                abort(500);
            }
        }
        \Session::flash('err_msg', '日報を登録しました');
        return redirect(route('report.complete'));
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

        $report = Daily_report::find($id);

        if (is_null($report)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('report.index'));
        }
        \Session::put('auth_cd', $report->auth_user_cd);
        \Session::put('post_cd', $report->post_user_cd);
        \Session::put('post_no', $report->no);

        return view('report.dailyreport', compact('report', 'title', 'err_msgs', 'css'));
    }

    /**
     * 日報登録完了画面を表示する
     * 
     * @return view
     */

    public function complete()
    {
        //ビューの動作確認用サンプルデータ作成
        $tagu = '日報登録完了';
        $css = 'usertouroku.css';

        //ビューを呼び出す
        return view('report.complete', compact('tagu', 'css'));
    }


    /**
     * 日報を削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Respons
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