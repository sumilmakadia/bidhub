<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MessagesFormRequest extends FormRequest
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
            'sent_to' => 'required',
            'message' => 'required|string',
            'created_by' => 'required',
            'project_id' => 'nullable',
            'updated_date' => 'nullable',
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
        $data = $this->only(['sent_to', 'message', 'created_by', 'project_id', 'updated_date']);

        return $data;
    }

}