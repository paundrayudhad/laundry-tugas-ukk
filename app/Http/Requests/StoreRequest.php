<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'password' => 'required|min:6',
            'email' => 'required|email'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi!',
            'email' => 'Format :attribute harus valid!',
            'numeric' => ':attribute harus berupa angka!',
            'min' => ':attribute minimal :min karakter!',
        ];
    }
}
