<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SurveyQuestionsRequest extends FormRequest
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
            'survey_id'=>'required|exists:surveys,id',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'type' => 'required',
            'is_required' => 'required'
        ];
    }
}
