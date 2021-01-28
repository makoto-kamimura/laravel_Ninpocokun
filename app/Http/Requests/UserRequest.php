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
            'sei' => ['required'],
            'mei' => ['required'],
            'sei_kana' => ['required'],
            'mei_kana' => ['required'],
            // 'dep_cd' => ['required'],
            // 'div_cd' => ['required'],
            'password' => ['required'],
            //'pos_cd' => ['required'],
            //'sys_admin' => ['required'],
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