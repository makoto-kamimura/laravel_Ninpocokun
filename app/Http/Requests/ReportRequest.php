<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 日報記入事項のバリデーション
            'sagyou' => 'required | max:360',
            'shintyoku' => 'required | max:360',
            'zansagyou' => 'required | max:360',
            'hikitsugi' => 'required | max:360',
            'comment' => 'max:360',
        ];
    }

    //[ *3.追加：Validationメッセージを設定（省略可） ]
    //function名は必ず「messages」となります。
    public function messages()
    {
        return [
            // 日本語バリデーションのエラーメッセージ

        ];
    }

    //400エラーを返したい場合

    // protected function failedValidation(Validator $validator)
    // {
    //     $res = response()->json([
    //         'status' => 400,
    //         'errors' => $validator->errors(),
    //     ], 400);
    //     throw new HttpResponseException($res);
    // }
}