<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserOldAppRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',
//            'country_code' => 'required|string',
            'phone' => 'required',
            'username' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6',
            'fcm_token' => 'nullable',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'state_id' => 'required|exists:states,id',
            'about_ar' => 'nullable',
            'about_en' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:20480',
        ];
    }
}
