<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordPostCommentRequest extends FormRequest
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
            'comment' => ['required', 'max:20', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'comment' => 'コメント',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => ':attributeは必須項目です',
            'comment.max' => ':attributeは20文字以内です',
            'comment.string' => ':attributeは文字列である必要があります',
        ];
    }
}
