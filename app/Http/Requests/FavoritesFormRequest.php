<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class FavoritesFormRequest extends FormRequest
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
            'created_by' => 'required',
            'proposal_id' => 'nullable|string|min:0',
            'project_id' => 'nullable|string|min:0',
            'member_id' => 'nullable|string|min:0',
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
        $data = $this->only(['created_by', 'proposal_id', 'project_id', 'member_id']);

        return $data;
    }

}