<?php

namespace App\Http\Requests;

use App\Enums\Availability;
use App\Enums\Condition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'sku' => ['nullable', 'string'],
            'name' => ['required', 'string'],
            'slug' => ['nullable', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'min:1'],
            'minimum' => ['required', 'min:1'],
            'availability' => ['required', Rule::enum(Availability::class)],
            'is_hidden' => ['required', 'boolean'],
            'images.*' => ['image']
        ];
    }
}
