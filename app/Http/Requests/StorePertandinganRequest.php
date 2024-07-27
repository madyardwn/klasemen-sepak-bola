<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePertandinganRequest extends FormRequest
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
            'home_klub_id' => 'required|exists:klubs,id',
            'away_klub_id' => 'required|exists:klubs,id',
            'home_klub_score' => 'required|integer|min:0',
            'away_klub_score' => 'required|integer|min:0',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'home_klub_id.required' => 'Klub tuan rumah wajib diisi.',
            'home_klub_id.exists' => 'Klub tuan rumah tidak valid.',
            'away_klub_id.required' => 'Klub tamu wajib diisi.',
            'away_klub_id.exists' => 'Klub tamu tidak valid.',
            'home_klub_score.required' => 'Skor klub tuan rumah wajib diisi.',
            'home_klub_score.integer' => 'Skor klub tuan rumah harus berupa angka.',
            'home_klub_score.min' => 'Skor klub tuan rumah minimal :min.',
            'away_klub_score.required' => 'Skor klub tamu wajib diisi.',
            'away_klub_score.integer' => 'Skor klub tamu harus berupa angka.',
            'away_klub_score.min' => 'Skor klub tamu minimal :min.',
        ];
    }
}
