<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumber;

class PhoneRequest extends FormRequest
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
            'address' => 'required',
            'mobile'  => ['required',new PhoneNumber],
            'money_ship' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute Không được nhỏ hơn :min',
            'max' => ':attribute Không được lớn hơn :max',
            'integer' => ':attribute Chỉ được nhập số',
        ];
    }
    public function attributes()
    {
        return [
           'address' => 'Địa chỉ',
           'mobile' => 'SĐT',
           'money_ship' => 'Tiền ship',
       ];
   }
}
