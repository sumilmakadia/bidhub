<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrMembership2PlansFormRequest extends FormRequest
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
            'product_id' => 'nullable|string|min:0|max:100',
            'plan_name' => 'nullable|string|min:0|max:255',
            'plan_description' => 'nullable',
            'plan_amount' => 'nullable|numeric|min:-99999999.99|max:99999999.99',
            'plan_object' => 'nullable',
            'plan_billing_scheme' => 'nullable|string|min:0|max:100',
            'plan_currency' => 'nullable|string|min:0|max:100',
            'plan_interval' => 'nullable|string|min:0|max:100',
            'plan_interval_count' => 'nullable|numeric|string|min:0|max:100',
            'plan_livemode' => 'nullable|string|min:0|max:100',
            'trial_period_days' => 'nullable|numeric|min:-2147483648|max:2147483647',
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
        $data = $this->only(['product_id', 'plan_name', 'plan_description', 'plan_amount', 'plan_object', 'plan_billing_scheme', 'plan_currency', 'plan_interval', 'plan_interval_count', 'plan_livemode', 'trial_period_days']);

        return $data;
    }

}