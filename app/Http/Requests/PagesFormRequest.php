<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class PagesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'author_id' => 'required|numeric|min:0|max:4294967295',
            'title' => 'required|string|min:1|max:255',
            'excerpt' => 'nullable',
            'body' => 'nullable',
            'image' => 'nullable|numeric|string|min:0|max:255',
            'slug' => 'required|string|min:1|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required',
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
        $data = $this->only(['author_id', 'title', 'excerpt', 'body', 'image', 'slug', 'meta_description', 'meta_keywords', 'status']);

        return $data;
    }

}