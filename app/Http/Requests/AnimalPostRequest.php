<?php

namespace App\Http\Requests;

class AnimalPostRequest extends BaseRequest
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
            'name' => 'required|string|max:255',
            'animal_type' => 'required|string|max:100',
            'client_id' => 'required|exists:clients,id',
            'company_id' => 'required|exists:companies,id',
        ];
    }
}
