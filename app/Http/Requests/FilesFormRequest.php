<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class FilesFormRequest extends FormRequest
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
            'file_name' => 'nullable|string|min:0|max:255',
            'file_path' => 'nullable',
            'file_type' => 'nullable|string|min:0|max:255',
            'project_id' => 'nullable|string|min:0',
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
        $data = $this->only(['file_name', 'file_path', 'file_type', 'project_id', 'created_by']);

        return $data;
    }

}