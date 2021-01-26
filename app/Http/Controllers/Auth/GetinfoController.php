<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetinfoController extends Controller
{
    // 部コードから課コードを取得
    public function getDiv($dep_cd)
    {
        return DB::table('divisions')
            ->where('dep_cd', $dep_cd)
            ->select('cd', 'name')
            ->get();
    }

    // 部コードから社員番号、社員名を取得
    public function getUserByDep($dep_cd)
    {
        return DB::table('v_user_info')
            ->where('dep_cd', $dep_cd)
            ->select('user_cd', 'user_name')
            ->get();
    }

    // 課コードから社員番号、社員名を取得
    public function getUserByDiv($div_cd)
    {
        return DB::table('v_user_info')
            ->where('div_cd', $div_cd)
            ->select('user_cd', 'user_name')
            ->get();
    }
}