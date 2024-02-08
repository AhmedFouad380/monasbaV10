<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'nullable|string|min:2|max:255',
            'email' => 'nullable|email',
            'country_id' => 'nullable|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'state_id' => 'nullable|exists:states,id',
            'about_ar' => 'nullable',
            'about_en' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:20480',
            'cover' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:20480',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            msgdata(false, trans('lang.there_is_some_errors'), $validator->errors()->all(), validation())
        );
    }
}
