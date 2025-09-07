<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampaignRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'target_amount' => 'sometimes|required|numeric|min:10000',
            'status' => 'sometimes|in:active,closed',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Judul kampanye wajib diisi.',
            'title.string' => 'Judul kampanye harus berupa teks.',
            'title.max' => 'Judul kampanye maksimal 255 karakter.',
            'description.required' => 'Deskripsi kampanye wajib diisi.',
            'description.string' => 'Deskripsi kampanye harus berupa teks.',
            'target_amount.required' => 'Jumlah target wajib diisi.',
            'target_amount.numeric' => 'Jumlah target harus berupa angka.',
            'target_amount.min' => 'Jumlah target minimal adalah 10.000.',
            'status.in' => 'Status kampanye harus berupa "active" atau "closed".',
        ];
    }
}
