<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\ProductDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'brand_id' => ['required', 'integer'],
            'product_type_id' => ['required', 'integer'],

            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:255'],
            'barcode' => ['nullable', 'string', 'max:255'],

            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],

            'weight' => ['nullable', 'numeric'],
            'length' => ['nullable', 'numeric'],
            'width' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],

            'status' => ['required'],
            'visibility' => ['required'],
            'is_featured' => ['required'],
            'is_service' => ['required'],
        ];
    }

    public function toDTO(): ProductDTO
    {
        return new ProductDTO(
            category_id: $this->integer('category_id'),
            brand_id: $this->integer('brand_id'),
            product_type_id: $this->integer('product_type_id'),

            name: $this->string('name')->value(),
            slug: $this->string('slug')->value(),
            sku: $this->string('sku')->value(),

            short_description: $this->string('short_description')->value(),
            description: $this->string('description')->value(),

            status: $this->boolean('status'),
            visibility: $this->boolean('visibility'),

            is_featured: $this->boolean('is_featured'),
            is_service: $this->boolean('is_service'),

            barcode: $this->string('barcode')->value(),

            weight: $this->filled('weight')
                ? (float) $this->input('weight')
                : null,

            length: $this->filled('length')
                ? (float) $this->input('length')
                : null,

            width: $this->filled('width')
                ? (float) $this->input('width')
                : null,

            height: $this->filled('height')
                ? (float) $this->input('height')
                : null,
        );
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',

            'brand_id.required' => 'Please select a brand.',
            'brand_id.exists' => 'The selected brand is invalid.',

            'product_type_id.required' => 'Please select a product type.',
            'product_type_id.exists' => 'The selected product type is invalid.',

            'name.required' => 'Please enter a product name.',
            'slug.required' => 'Please enter a product slug.',
            'sku.required' => 'Please enter a product SKU.',

            'weight.numeric' => 'Weight must be a valid number.',
            'length.numeric' => 'Length must be a valid number.',
            'width.numeric' => 'Width must be a valid number.',
            'height.numeric' => 'Height must be a valid number.',
        ];
    }
}
