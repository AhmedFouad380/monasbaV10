<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
                'type'=>'required|in:physical,virtual',
                'name_ar'=>'required',
                'name_en'=>'required',
                'description_ar'=>'required',
                'description_en'=>'required',
                'venue_ar'=>'required',
                'venue_en'=>'required',
                'lat'=>'required',
                'lng'=>'required',
                'address'=>'required',
                'venue_type'=>'required|in:indoor,outdoor',
                'date_type'=>'required|in:single,multi',
                'status'=>'nullable|in:active,inactive',
                'is_popular'=>'nullable|in:0,1',
                'video_type'=>'required|in:link,file',
                'video_name_ar'=>'nullable',
                'kt_docs_repeater_basic2'=>'array',
                'kt_docs_repeater_basic'=>'array',
//                'kt_docs_repeater_basic2.'=>'date',
                'video_name_en'=>'nullable',
                'video_description_ar'=>'nullable',
                'video_description_en'=>'nullable',
                'payment_type'=>'required|in:online,offline',
                'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', Rule::requiredIf($this->routeIs('events.store'))],
                'main_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', Rule::requiredIf($this->routeIs('events.store'))],
                'host_id'=>'nullable|exists:hosts,id',
            ];
    }
}
