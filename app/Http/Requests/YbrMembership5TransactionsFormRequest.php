<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrMembership5TransactionsFormRequest extends FormRequest
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
            'membership_start' => 'nullable',
            'membership_end' => 'nullable',
            'membership_charge_date' =>  'nullable',
            'membership_charge' =>  'nullable',
            'membership_object' => 'nullable',
            'product_id' =>  'nullable',
            'plan_id' =>  'nullable',
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
        $data = $this->only(['membership_start', 'membership_end', 'membership_charge_date', 'membership_charge', 'membership_object', 'product_id', 'plan_id', 'created_by']);

        return $data;
    }

}