<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProjectsFormRequest extends FormRequest
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
						'title' => 'nullable|string|min:0|max:255',
						'description' => 'nullable',
						'image' => 'nullable',
						'status' => 'nullable|string|min:0|max:255',
						'starts_on' => 'nullable',
						'need_bid_by_date' => 'nullable',
						'contact_method' => 'nullable|string|min:0|max:255',
						'how_many_units' => 'nullable|string|min:0',
						'job_type' => 'nullable|string|min:0|max:100',
						'country' => 'nullable|numeric|string|min:0|max:255',
						'state' => 'nullable|string|min:0|max:255',
						'city' => 'nullable|string|min:0|max:255',
						'zip' => 'nullable|string|min:0|max:255',
						'address' => 'nullable|string|min:0|max:500',
						'latitude' => 'nullable|string|min:0|max:255',
						'longtitude' => 'nullable|string|min:0|max:255'
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
        $data = $this->only(['title', 'description', 'image', 'status', 'starts_on', 'need_bid_by_date', 'contact_method', 'how_many_units', 'job_type', 'country', 'state', 'city', 'zip', 'address', 'latitude', 'longtitude', 'created_by']);

        return $data;
    }

}