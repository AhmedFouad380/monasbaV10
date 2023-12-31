<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
            'description_ar' => 'required|string|max:255',
            'description_en' => 'required|string|max:255',
            'type' => 'required',
            'status' => 'required',
            'event_id' => 'required_if:type,private',
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', Rule::requiredIf($this->routeIs('news.store'))],
        ];

    }
}
