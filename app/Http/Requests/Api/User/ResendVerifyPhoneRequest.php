<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResendVerifyPhoneRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country_code' => 'required|string',
            'phone' => 'required|string|exists:users,phone',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            msgdata(false, trans('lang.there_is_some_errors'), $validator->errors()->all(), validation())
        );
    }
}
