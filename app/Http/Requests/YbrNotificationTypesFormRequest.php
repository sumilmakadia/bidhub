<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrNotificationTypesFormRequest extends FormRequest
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
            'notification' => 'nullable|string|min:0|max:100',
            'created_on' => 'required|numeric|min:-2147483648|max:2147483647',
            'updated_on' => 'required|numeric|min:-2147483648|max:2147483647',
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
        $data = $this->only(['notification', 'created_on', 'updated_on']);

        return $data;
    }

}