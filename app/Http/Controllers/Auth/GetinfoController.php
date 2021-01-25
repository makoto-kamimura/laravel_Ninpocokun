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
        $div_cd = ''; //DBから取得

        return $div_cd;
    }

    // 部コードから社員番号、社員名を取得
    public function getUserByDep($dep_cd)
    {
        $cd = ''; // DBから取得
        $name = ''; // DBから取得

        return compact('cd', 'name');
    }

    // 課コードから社員番号、社員名を取得
    public function getUserByDiv($div_cd)
    {
        $cd = ''; // DBから取得
        $name = ''; // DBから取得

        return compact('cd', 'name');
    }
}