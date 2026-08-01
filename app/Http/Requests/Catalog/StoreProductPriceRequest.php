<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\ProductPriceDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StoreProductPriceRequest extends FormRequest
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
           'product_id' => ['required', 'integer', 'exists:products,id'],
            'currency'           => ['required', 'string', 'max:3'],
            'price_type'         => ['required', 'string', 'max:255'],
            'amount'             => ['required', 'numeric', 'min:0'],
            'starts_at'          => ['nullable', 'date'],
            'ends_at'            => ['nullable', 'date', 'after_or_equal:starts_at'],
        ];
    }


    public function toDTO(): ProductPriceDTO
    {
        // Using input as-is; DTO keeps amount as string for decimal safety.
        return new ProductPriceDTO(
            product_id: (int) $this->input('product_id'),
            currency: (string) $this->input('currency'),
            price_type: (string) $this->input('price_type'),
            amount: (string) $this->input('amount'),
            starts_at: $this->input('starts_at') ? $this->dateTime($this->input('starts_at')) : null,
            ends_at: $this->input('ends_at') ? $this->dateTime($this->input('ends_at')) : null,
        );
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Product selection is required.',
            'currency.required'           => 'Currency is required.',
            'price_type.required'         => 'Price type is required.',
            'amount.required'             => 'Amount is required.',
            'ends_at.after_or_equal'     => 'The end date must be after or equal to the start date.',
        ];
    }

    private function dateTime(string $value)
    {
        return \Illuminate\Support\Carbon::parse($value);
    }
}
