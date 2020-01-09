<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProposalsFormRequest extends FormRequest
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
            'bid_title' => 'nullable|string|min:0|max:255',
            'bid_decription' => 'nullable',
            'bid_status' => 'nullable|string|min:0|max:255',
            'bid_files_json' => 'nullable',
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
        $data = $this->only(['bid_title', 'bid_decription', 'bid_status', 'bid_files_json', 'project_id', 'created_by']);

        return $data;
    }

}