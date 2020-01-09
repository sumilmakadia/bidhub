<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrMembership6PermissionsFormRequest extends FormRequest
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
            'route' => 'nullable|string|min:0|max:100',
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
        $data = $this->only(['route', 'product_id', 'plan_id']);

        return $data;
    }

}