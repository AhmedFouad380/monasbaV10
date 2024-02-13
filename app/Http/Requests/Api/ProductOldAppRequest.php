<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ProductOldAppRequest extends FormRequest
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
            'id'=>['nullable','exists:products,id',Rule::requiredIf($this->routeIs('updateProduct'))],
            'name_ar'=>'required',
            'name_en'=>'required',
            'type'=>'required|in:sale,rent',
            'price'=>'required|integer|max:1000000',
            'description_ar'=>'nullable',
            'description_en'=>'nullable',
            'active_call'=>'nullable',
            'phone'=>'required_if:active_call,active',
            'active_whatsapp'=>'nullable',
            'active_chat'=>'nullable',
            'show_username'=>'in:active,inactive',
           // 'active_video'=>'nullable|in:active,inactive',
           // 'video'=>'required_if:active_video,active|max:40480',
            'image' => ['nullable',Rule::requiredIf($this->routeIs('storeProduct'))],
            'images'=>'nullable|array',
            'images.*' => 'nullable|mimes:png,jpg,jpeg,svg,webp,mp4|max:20480',
            'category_id'=>'nullable|exists:categories,id',
            'sub_category_id'=>'nullable|exists:sub_categories,id',
            'country_id'=>'nullable|exists:countries,id',
            'city_id'=>'nullable|exists:cities,id',
            'state_id'=>'nullable|exists:states,id',
            'currency_id'=>'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            msgdata(false, $validator->errors()->first(), null , failed())
        );
    }
}
