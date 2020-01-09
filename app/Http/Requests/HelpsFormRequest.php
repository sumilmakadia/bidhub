<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class HelpsFormRequest extends FormRequest
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
        $rules = [
            'title' => 'nullable',
            'description' => 'nullable',
            'file' => 'nullable',
            'level_of_experience' => 'nullable',
            'date_need_resume'=> 'nullable',
            'date_job_start' => 'nullable',
            'country' => 'nullable',
            'state'=> 'nullable',
            'city' => 'nullable',
            'address_1' => 'nullable',
            'address_2' => 'nullable',
            'zip_code' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'created_by' => 'required',
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['title', 'description', 'file', 'level_of_experience', 'date_need_resume', 'date_job_start', 'country', 'state', 'city', 'address_1', 'address_2', 'zip_code', 'latitude', 'longitude', 'created_by']);

        return $data;
    }

}