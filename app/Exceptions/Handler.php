<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    protected function renderHttpException(HttpExceptionInterface $e)
    {
        // 例外発生時にエラーステータスを取得
        $tagu = $e->getStatusCode();
        $message = $e->getMessage();
        // ステータスに応じてエラーメッセージを作成
        if (!$message) {
            switch ($tagu) {
                case 400:
                    $message = 'Bad Request';
                    break;
                case 401:
                    $message = '認証に失敗しました';
                    break;
                case 403:
                    $message = 'アクセス権限がありません';
                    break;
                case 404:
                    $message = '存在しないページです';
                    break;
                case 408:
                    $message = 'タイムアウトです';
                    break;
                case 414:
                    $message = 'リクエストURIが長すぎます';
                    break;
                case 419:
                    $message = '不正なリクエストです';
                    break;
                case 500:
                    $message = 'Internal Server Error';
                    break;
                case 503:
                    $message = 'Service Unavailable';
                    break;
                default:
                    $message = 'システム管理者に確認してください';
                    break;
            }
        }

        // viewを呼び出す
        return response()->view('errordisplay', compact('tagu', 'message'));
    }
}