<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSalesRequest extends FormRequest
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
            'createsales' =>['required','regex:/^[\x{4e00}-\x{9fa5}]{2,5}$/u']
        ];
    }

    public function messages()
    {
        return [
            'createsales.required' => '招生姓名不可空白',
            'createsales.regex' => '必須為中文且2~5個字'
        ];
    }
}
