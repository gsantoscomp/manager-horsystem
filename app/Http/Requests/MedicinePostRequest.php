<?php

namespace App\Http\Requests;

class MedicinePostRequest extends BaseRequest
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
            'quantity' => 'required|integer',
            'purchase_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'description' => 'nullable|string',
            'company_id' => 'required|integer|exists:companies,id',
        ];
    }
}
