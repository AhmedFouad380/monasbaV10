<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
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
            'name' => 'required|string|min:2|max:255',
            'country_code' => 'required|string',
            'phone' => 'required|string|unique:users,phone',
            'username' => 'nullable|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|confirmed',
            'fcm_token' => 'nullable',
//            'country_id' => 'required',
//            'city_id' => 'required',
//            'state_id' => 'required',
            'about_ar' => 'nullable',
            'about_en' => 'nullable',
            'uid'=>'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:20480',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            msgdata(false, trans('lang.there_is_some_errors'), $validator->errors()->all(), validation())
        );
    }
}
