<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * システム管理者かどうかを判断するミドルウェア
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $admin = auth()->user()->sys_admin;
            if (in_array($admin, ['1'])) {
                return $next($request);
            }
        }
        abort(403, '管理者権限がありません。');
    }
}