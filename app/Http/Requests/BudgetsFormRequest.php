<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BudgetsFormRequest extends FormRequest
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
            'budget_title' => 'nullable',
            'budget_amount' => 'nullable',
            'budget_status' => 'nullable',
            'created_by' => 'required',
            'project_id' => 'nullable',
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
        $data = $this->only(['budget_title', 'budget_amount', 'budget_status', 'created_by', 'project_id']);

        return $data;
    }

}