<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EquipmentsFormRequest extends FormRequest
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
            'property_title' => 'nullable|string|min:0|max:100',
            'property_description' => 'nullable',
            'property_contact' => 'nullable|string|min:0|max:100',
            'property_email' => 'nullable|string',
            'property_phone' => 'nullable|string',
            'property_image' => 'nullable',
            'property_acres' => 'nullable|string',
            'property_cost' => 'nullable|string',
            'property_files_json' => 'nullable',
            'property_annual_taxes' => 'nullable|string',
            'parcel_tax_number' => 'nullable|numeric|string',
            'location' => 'nullable|string'
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
        $data = $this->only(['property_title', 'property_description', 'property_contact', 'property_email', 'property_phone', 'property_image', 'property_acres', 'property_cost', 'property_files_json', 'property_annual_taxes', 'parcel_tax_number', 'property_country', 'property_state', 'property_city', 'property_zip', 'property_address1', 'property_address2', 'property_lat', 'property_long', 'created_by']);

        return $data;
    }

}