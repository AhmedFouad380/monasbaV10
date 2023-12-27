<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name_ar'=>'required',
            'name_en'=>'required',
            'terms_ar'=>'required',
            'terms_en'=>'required',
            'about_ar'=>'required',
            'about_en'=>'required',
            'logo'=>'nullable',
            'ios_version'=>'required',
            'android_version'=>'required',
        ];
    }
}
