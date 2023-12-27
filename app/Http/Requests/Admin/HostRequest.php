<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class HostRequest extends FormRequest
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
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'email' => 'required|email|unique:hosts,email,'.$this->id,
            'phone' => 'required|unique:hosts,phone,'.$this->id,
            'password' => ['nullable',Password::min(8)->letters()->mixedCase()->numbers()->symbols(), Rule::requiredIf($this->routeIs('hosts.store'))],
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
            'vision_ar' => 'nullable',
            'vision_en' => 'nullable',
            'type' => 'required|in:single,multi',
//            'status' => 'nullable',
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg'],
        ];
    }
}
