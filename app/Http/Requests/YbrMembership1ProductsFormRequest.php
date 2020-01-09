<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrMembership1ProductsFormRequest extends FormRequest
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
            'product_title' => 'nullable|string|min:0|max:255',
            'product_description' => 'nullable',
            'product_status' => 'nullable|string|min:0|max:255',
            'product_object' => 'nullable',
            'product_images' => 'nullable|numeric',
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
        $data = $this->only(['product_title', 'product_description', 'product_status', 'product_object', 'product_images']);

        return $data;
    }

}