<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $this->id,
            'phone' => 'required|unique:employees,phone,' . $this->id,
            'password' => ['nullable', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), Rule::requiredIf($this->routeIs('users.store'))],
            'status' => 'required',
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg'],
            'host_id' => 'required|exists:hosts,id',
            'event_id' => 'required|array',
            'event_id.*' => 'exists:events,id',
            'gender' => 'required|in:male,female',

        ];
    }
}
