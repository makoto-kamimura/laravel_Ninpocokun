<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // default false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Validationルール記述箇所
            // バリデーションの内容は要確認
            'sei' => 'required | max:6',
            'mei' => 'required | max:10',
            'sei_kana' => 'required | max:10',
            'mei_kana' => 'required | max:20',
            'password' => 'required | alpha_num | between:8,16 | confirmed',
            'password_confirmation' => 'required | alpha_num | between:8,16',
            'taishoku_date' => 'nullable | date',
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