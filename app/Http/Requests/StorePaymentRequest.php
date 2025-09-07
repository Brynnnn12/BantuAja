<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'donation_id' => 'required|exists:donations,id',
            'amount' => 'required|numeric|min:10000',
            'status' => 'in:pending,paid,failed',
            'snap_token' => 'nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'donation_id.required' => 'Donation ID wajib diisi.',
            'donation_id.exists' => 'Donation ID tidak valid.',
            'amount.required' => 'Jumlah pembayaran wajib diisi.',
            'amount.numeric' => 'Jumlah pembayaran harus berupa angka.',
            'amount.min' => 'Jumlah pembayaran minimal adalah 10.000.',
            'status.in' => 'Status pembayaran harus berupa "pending", "paid", atau "failed".',
            'snap_token.string' => 'Snap token harus berupa teks.',
        ];
    }
}
