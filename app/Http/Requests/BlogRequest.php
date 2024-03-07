<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title_ar' => ['required', 'string', 'min:1', 'max:255'],
            'title_en' => ['required', 'string', 'min:1', 'max:255'],
            'description_ar' => ['nullable'],
            'description_en' => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_tags' => ['nullable'],
            'status' => ['required', 'string', 'in:active,inactive'],
             'country_id' => ['nullable', 'exists:countries,id'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg'],

        ];
    }
}
