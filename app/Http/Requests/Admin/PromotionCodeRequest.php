<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PromotionCodeRequest extends FormRequest
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
            'code' => 'required|unique:promotion_codes,code,'.$this->id,
            'start_at' => 'required',
            'end_at' => 'required',
            'qty' => 'required',
            'type' => 'required',
            'discount' => 'required',
            'max_discount' => 'nullable',
            'status' => 'required',
        ];
    }
}
