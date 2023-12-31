<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscribeRequest extends FormRequest
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
            'tickets'=>'required',
            'event_type' => 'required',
            'payment_method' => 'required',
            'extra_feature' => 'nullable',
            'paid_status' => 'required',
            'status' => 'required',
        ];
    }
}
