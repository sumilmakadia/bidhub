<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrMembership3MembersFormRequest extends FormRequest
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
            'status' => 'required|string|min:1|max:100',
            'object' => 'required',
            'customer_id' => 'required|string|min:1|max:100',
            'product_id' => 'required|string|min:1|max:100',
            'plan_id' => 'required|string|min:1|max:100',
            'plan_amount' => 'required|numeric|min:-99999999.99|max:99999999.99',
            'plan_interval' => 'required|string|min:1|max:100',
            'plan_interval_count' => 'required|numeric|min:-2147483648|max:2147483647',
            'trial_period_days' => 'required|numeric|min:-2147483648|max:2147483647',
            'created' => 'nullable|date_format:j/n/Y g:i A',
            'canceled_at' => 'nullable|date_format:j/n/Y g:i A',
            'current_period_start' => 'nullable|date_format:j/n/Y g:i A',
            'current_period_end' => 'nullable|date_format:j/n/Y g:i A',
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
        $data = $this->only(['status', 'object', 'customer_id', 'product_id', 'plan_id', 'plan_amount', 'plan_interval', 'plan_interval_count', 'trial_period_days', 'created', 'canceled_at', 'current_period_start', 'current_period_end']);

        return $data;
    }

}