<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExhibitorsRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'url' => 'nullable',
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', Rule::requiredIf($this->routeIs('exhibitors.store'))],
            'status' => 'required',
            'event_id'=>'required|exists:events,id',
        ];
    }
}
