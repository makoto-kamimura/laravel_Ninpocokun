<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_report extends Model
{
    //テーブル名
    //protected $table = '';

    // 可変項目
    protected $fillable =
    [
        'no', 'post_user_id', 'auth_user_id', 'sagyou',
        'shintyoku', 'zansagyou', 'hikitsugi',
    ];
}