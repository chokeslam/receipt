<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeUserRequest extends FormRequest
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
            'changereceipt'       => 'required',
            'changeuser'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'changereceipt.required' => '請選擇分班',
            'changeuser.required' => '請選擇業務'
        ];
    }
}
