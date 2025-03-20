<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'first_name' => ['required', 'string:255'],
            'last_name' => ['required', 'string:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'country' => ['nullable', 'string:255'],
            'city' => ['required', 'string:255'],
            'postcode' => ['required', 'string:255'],
            'address' => ['required', 'string:255'],
            'line1' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'total' => ['nullable', 'numeric']
        ];
    }
}
