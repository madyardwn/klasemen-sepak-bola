<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKlubRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:klubs,name,' . $this->klub->id],
            'city' => ['required', 'string', 'max:255'],
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
            'name.required' => 'Nama klub wajib diisi',
            'name.string' => 'Nama klub harus berupa string',
            'name.max' => 'Nama klub maksimal 255 karakter',
            'name.unique' => 'Nama klub sudah terdaftar',
            'city.required' => 'Kota asal klub wajib diisi',
            'city.string' => 'Kota asal klub harus berupa string',
            'city.max' => 'Kota asal klub maksimal 255 karakter',
        ];
    }
}
