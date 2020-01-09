<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DirectoriesFormRequest extends FormRequest
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
            'company_name' => 'nullable',
            'company_description' => 'nullable',
            'company_phone' => 'nullable',
            'company_email' => 'nullable',
            'company_image' => 'nullable',
            'company_website' => 'nullable',
            'company_contact' => 'nullable',
            'company_experience' => 'nullable',
            'company_submit_deadline' =>'nullable',
            'company_contact_deadline' => 'nullable',
            'company_country' => 'nullable',
            'company_state' =>'nullable',
            'company_city' => 'nullable',
            'company_zip' =>'nullable',
            'company_latitude' =>'nullable',
            'company_longitude' => 'nullable',
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
        $data = $this->only(['company_name', 'company_description', 'company_phone', 'company_email', 'company_image', 'company_website', 'company_contact', 'company_experience', 'company_submit_deadline', 'company_contact_deadline', 'company_country', 'company_state', 'company_city', 'company_zip', 'company_latitude', 'company_longitude', 'created_by']);

        return $data;
    }

}