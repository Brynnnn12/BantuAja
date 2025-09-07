<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'campaign_id' => 'required|exists:campaigns,id',
            'amount' => 'required|numeric|min:10000',
            'status' => 'in:pending,completed',
        ];
    }

    public function messages(): array
    {
        return [

            'campaign_id.required' => 'Campaign ID wajib diisi.',
            'campaign_id.exists' => 'Campaign ID tidak valid.',
            'amount.required' => 'Jumlah donasi wajib diisi.',
            'amount.numeric' => 'Jumlah donasi harus berupa angka.',
            'amount.min' => 'Jumlah donasi minimal adalah 10.000.',
            'status.in' => 'Status donasi harus berupa "pending" atau "completed".',
        ];
    }
}
