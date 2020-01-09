<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrMembership5AddonsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'addon_name' => 'nullable|string|min:0|max:200',
            'addon_description' => 'nullable|string|min:0|max:500',
            'addon_price' => 'nullable|numeric|min:-99999999.99|max:99999999.99',
            'product_id' => 'nullable|string|min:0',
            'plan_id' => 'nullable|string|min:0',
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
        $data = $this->only(['addon_name', 'addon_description', 'addon_price', 'product_id', 'plan_id']);

        return $data;
    }

}