<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_report extends Model
{
    //テーブル名
    protected $table = 'daily_reports';

    protected $guarded = ["created_at", "updated_at"];

    // プライマリキーを設定する
    protected $primaryKey = 'no';
    // インクリメントを無効化
    public $incrementing = false;
}