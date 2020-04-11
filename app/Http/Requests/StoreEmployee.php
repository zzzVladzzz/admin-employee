<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'contract_expiration_date' => $this->get('contract-expiration-date'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email:rfc',
            'phone' => 'required|digits_between:5,11',
            'address' => 'required|max:255',
            'contract_expiration_date' => 'required|date|max:255',
            'manager_id' => 'exists:users,id',
            'file_contract' => 'max:10240|mimes:pdf'
        ];
    }
}
