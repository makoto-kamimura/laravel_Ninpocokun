<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_report extends Model
{
    //テーブル名
    protected $table = 'daily_reports';

    // 可変項目
    // protected $fillable =
    // [
    //     'no', 'post_user_cd', 'auth_user_cd', 'sagyou',
    //     'shintyoku', 'zansagyou', 'hikitsugi', 'comment', 'status', 'target_date',
    // ];

    protected $guarded = ["created_at", "updated_at"];
}