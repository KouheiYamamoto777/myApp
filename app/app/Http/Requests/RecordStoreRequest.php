<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
            'year' => ['required', 'numeric'],
            'month' => ['required', 'numeric'],
            'income' => ['required', 'integer'],
            'outgo' => ['required', 'integer'],
            'title' => ['nullable', 'string', 'max:20'],
            'comment' => ['nullable', 'string', 'max:120'],
        ];
    }

    public function attributes()
    {
        return [
            'income' => '今月の収入',
            'outgo' => 'クレジットカードの使用額',
            'title' => 'タイトル',
            'comment' => 'コメント'
        ];
    }

    public function messages()
    {
        return [
            'year.required' => ':attributeは必須項目です',
            'year.numeric' => ':attributeは数字である必要があります',
            'month.required' => ':attributeは必須項目です',
            'month.numeric' => ':attributeは数字である必要があります',
            'income.required' => ':attributeは必須項目です',
            'income.numeric' => ':attributeは数字である必要があります',
            'outgo.required' => ':attributeは必須項目です',
            'outgo.numeric' => ':attributeは数字である必要があります',
            'title.string' => ':attributeは文字である必要があります',
            'title.max' => ':attributeは20文字以内です',
            'comment.string' => ':attributeは文字である必要があります',
            'comment.max' => ':attributeは120文字以内です',
        ];
    }
}
