<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TicketRequest extends FormRequest
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
            'event_id'=>'required|exists:events,id',
            'quantity' => 'required',
            'quantity_per_user' => 'required',
            'type' => 'required|in:free,payable',
            'payable_type' => ['nullable','in:online,offline,both',Rule::requiredIf($this->type == 'payable')],
            'expire_date' => 'nullable',
            'need_approve' => 'required',
            'is_recommended' => 'required',
            'status' => 'required',
            'price' => 'required',
        ];
    }
}
