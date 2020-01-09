<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MarketplacesFormRequest extends FormRequest
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
            'company_name' => 'nullable|string|min:0|max:255',
            'company_description' => 'nullable',
            'company_phone' => 'nullable|string|min:0|max:255',
            'company_email' => 'nullable|string|min:0|max:255',
            'company_image' => 'nullable|numeric',
            'company_website' => 'nullable|string|min:0|max:255',
            'company_contact' => 'nullable|string|min:1|max:100',
            'company_country' => 'nullable|string|string|min:0|max:255',
            'company_state' => 'nullable|string|min:0|max:255',
            'company_city' => 'nullable|string|min:0|max:255',
            'company_zip' => 'nullable|string|min:0|max:255',
            'company_longitude' => 'nullable|string|min:0|max:255',
            'company_latitude' => 'nullable|string|min:0|max:255',
            'created_by' => 'nullable',
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
        $data = $this->only(['company_name', 'company_description', 'company_category', 'company_phone', 'company_email', 'company_image', 'company_website', 'company_contact', 'company_country', 'company_state', 'company_city', 'company_zip', 'company_longitude', 'company_latitude', 'created_by']);

        return $data;
    }

}