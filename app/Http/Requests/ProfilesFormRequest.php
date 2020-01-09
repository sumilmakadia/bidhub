<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProfilesFormRequest extends FormRequest
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
            'first_name' => 'required|string|min:1|max:100',
            'last_name' => 'nullable|string|min:0|max:100',
            'bio' => 'nullable',
            'avatar' => 'nullable|file|string|min:0|max:255',
            'country' => 'nullable|numeric|string|min:0|max:100',
            'state' => 'nullable|string|min:0|max:100',
            'city' => 'nullable|string|min:0|max:100',
            'zip' => 'nullable|string|min:0|max:100',
            'age' => 'nullable|numeric|string|min:0|max:100',
            'role' => 'nullable|string|min:0|max:100',
            'lat' => 'nullable|string|min:0|max:100',
            'long' => 'nullable|string|min:0|max:100',
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
        $data = $this->only(['first_name', 'last_name', 'bio', 'avatar', 'country', 'state', 'city', 'zip', 'role', 'lat', 'long']);

        return $data;
    }

}