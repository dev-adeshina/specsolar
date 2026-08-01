<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductPriceRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_variant_id' => ['sometimes', 'required', 'integer', 'exists:product_variants,id'],
            'currency'           => ['sometimes', 'required', 'string', 'max:3'],
            'price_type'         => ['sometimes', 'required', 'string', 'max:255'],
            'amount'             => ['sometimes', 'required', 'numeric', 'min:0'],

            'starts_at'          => ['sometimes', 'nullable', 'date'],
            'ends_at'            => ['sometimes', 'nullable', 'date', 'after_or_equal:starts_at'],
        ];
    }
}
