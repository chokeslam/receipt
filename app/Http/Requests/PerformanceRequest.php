<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerformanceRequest extends FormRequest
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
            'Place'=>'required',
            'Class'=>'required',
            'Status'=>'required',
            'Name'=>'required',
            'Amount'=>['required','regex:/^[1-9]?[0-9]+(.[0-9]?[1-9])?$/']
        ];
    }
    public function messages()
    {
        return [
            'Place.required' => '請選擇分班',
            'Class.required' => '請選擇類別',
            'Status.required' => '請選擇狀態',
            'Name.required' => '請選擇業務',
            'Amount.required' => '請輸入金額',
            'Amount.regex'=>'請輸入正確數字'          
        ];
    }
}
