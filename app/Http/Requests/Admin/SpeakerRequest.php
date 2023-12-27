<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpeakerRequest extends FormRequest
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
            'name_ar' => 'required ',
            'name_en' => 'required',
            'job_title_ar' => 'required ',
            'job_title_en' => 'required',
            'bio_ar'=>'nullable',
            'bio_en'=>'nullable',
            'speech_type' => 'required|in:text,video',
            'speech_ar'=>'nullable',
            'speech_en'=>'nullable',
            'speech_video_link' => 'required_if:speech_type,==,video',
            'status' => 'required',
            'host_id'=>'required|exists:hosts,id',
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', Rule::requiredIf($this->routeIs('speakers.store'))],
        ];
    }
}
