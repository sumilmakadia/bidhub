<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class YbrMembership4AffiliatesFormRequest extends FormRequest
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
            'created_by' => 'nullable',
            'affiliate_total_referrals' => 'nullable|string|min:0',
            'affiliate_url' => 'nullable',
            'affiliate_status' => 'required|string|min:1|max:100',
            'affiliate_email' => 'required|string|min:1|max:100',
            'affiliate_phone' => 'required|string|min:1|max:100',
            'affiliate_country' => 'required|numeric|min:-2147483648|max:2147483647',
            'affiliate_state' => 'required|numeric|min:-2147483648|max:2147483647',
            'affiliate_city' => 'required|numeric|min:-2147483648|max:2147483647',
            'affiliate_address' => 'required|numeric|min:-2147483648|max:2147483647',
            'affiliate_address2' => 'required|numeric|min:-2147483648|max:2147483647',
            'affiliate_zip' => 'required|numeric|min:-2147483648|max:2147483647',
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
        $data = $this->only(['created_by', 'affiliate_total_referrals', 'affiliate_url', 'affiliate_status', 'affiliate_email', 'affiliate_phone', 'affiliate_country', 'affiliate_state', 'affiliate_city', 'affiliate_address', 'affiliate_address2', 'affiliate_zip']);

        return $data;
    }

}