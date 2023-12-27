<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class EventRequestsRequest extends FormRequest
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
         'type' => ['nullable','in:pending,approved,rejected', Rule::requiredIf($this->routeIs('eventsRequests.store'))],
         'quantity'=>['nullable',Rule::requiredIf($this->routeIs('eventsRequests.store'))],
         'ticket_price'=>['nullable',Rule::requiredIf($this->routeIs('eventsRequests.store'))],
         'event_id'=>['nullable',Rule::requiredIf($this->routeIs('eventsRequests.store'))],
         'user_id'=>['nullable',Rule::requiredIf($this->routeIs('eventsRequests.store'))],
         'ticket_id'=>['nullable',Rule::requiredIf($this->routeIs('eventsRequests.store'))],
         'is_payed'=>'nullable',
     ];
    }
}
