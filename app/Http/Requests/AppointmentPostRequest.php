<?php

namespace App\Http\Requests;

class AppointmentPostRequest extends BaseRequest
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
            'client_id' => 'required|string|exists:clients,id',
            'animal_id' => 'required|string|exists:animals,id',
            'company_id' => 'required|string|exists:companies,id',
        ];
    }
}
