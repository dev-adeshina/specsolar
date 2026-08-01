<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\ProductImageDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Shared\Validation\ImageRules;

class StoreProductImageRequest extends FormRequest
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
            'image' => ImageRules::upload(),
            'alt' => ['nullable', 'string', 'max:255'],
            'is_primary' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ];
    }

    public function toDTO(): ProductImageDTO
    {
        return new ProductImageDTO(
            id: null,
            product_id: (int) $this->input('product_id'),
            image: $this->file('image'),
            image_url: null,
            alt: $this->input('alt'),
            is_primary: (bool) $this->input('is_primary', false),
            sort_order: (int) $this->input('sort_order', 0),
        );
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Product is required.',
            'product_id.exists' => 'Product not found.',
            'image.string' => 'Image must be a string.',
            'alt.string' => 'Alt must be a string.',
            'is_primary.boolean' => 'is_primary must be true or false.',
            'sort_order.integer' => 'sort_order must be an integer.',
        ];
    }
}
