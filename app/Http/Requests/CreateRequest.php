<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'place'       => 'required',
            'firstnumber' => ['required','regex:/^\d{6}$/'],
            'lastnumber'  => ['required','regex:/^\d{6}$/']
        ];
    }

    public function messages()
    {
        return [
            'place.required' => '請選擇分班',
            'firstnumber.required' => '起始號碼不可空白',
            'firstnumber.regex' => '起始號碼為六位數字',
            'lastnumber.required' => '結束號碼不可空白',
            'lastnumber.regex' => '結束號碼為六位數字',
        ];
    }
}
