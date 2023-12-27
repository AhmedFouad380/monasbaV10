<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'name_ar' => ['required', 'string', 'min:1', 'max:255'],
            'name_en' => ['required', 'string', 'min:1', 'max:255'],
            'price' => ['required', 'integer', 'min:-2147483648', 'max:2147483647'],
            'phone' => ['required', 'string', 'min:1', 'max:255'],
            'description_ar' => ['nullable'],
            'description_en' => ['nullable'],
            'type' => ['required', 'string', 'in:sale,rent'],
            'status' => ['required', 'string', 'in:active,inactive'],
            'active_call' => ['required', 'string', 'in:active,inactive'],
            'active_whatsapp' => ['required', 'string', 'in:active,inactive'],
            'active_chat' => ['required', 'string', 'in:active,inactive'],
            'show_username' => ['required', 'string', 'in:active,inactive'],
            'active_video' => ['required', 'string', 'in:inactive,active'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg'],
            'category_id' => ['required', 'exists:categories,id'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'currency_id' => ['nullable', 'exists:currencies,id'],
            'state_id' => ['required', 'exists:states,id'],
            'user_id' => ['required', 'exists:users,id'],
            'country_id' => ['nullable', 'exists:countries,id']

        ];
    }
}
