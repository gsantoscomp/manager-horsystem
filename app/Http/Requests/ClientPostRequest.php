<?php

namespace App\Http\Requests;


class ClientPostRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'document_type' => 'required|string',
            'document' => 'required|string|unique:clients,document',
            'address' => 'required|string',
            'company_id' => 'required|exists:companies,id'
        ];
    }
}
