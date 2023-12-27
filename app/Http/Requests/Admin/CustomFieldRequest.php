<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomFieldRequest extends FormRequest
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
            'host_id'=>'required|exists:hosts,id',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'field_name' => 'required|string|max:255',
            'type' => 'required',
            'status' => 'required'
        ];
    }
}
