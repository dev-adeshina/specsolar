<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\ProductTypeAttributeDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;



class StoreProductTypeAttributeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_type_id' => [
                'required',
                'exists:product_types,id',
            ],

            'attribute_id' => [
                'required',
                'exists:attributes,id',
            ],

            'required' => [
                'boolean',
            ],

            'is_variant' => [
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function toDTO(): ProductTypeAttributeDTO
    {
        return new ProductTypeAttributeDTO(
            product_type_id: $this->integer('product_type_id'),
            attribute_id: $this->integer('attribute_id'),
            required: $this->boolean('required'),
            is_variant: $this->boolean('is_variant'),
            sort_order: $this->filled('sort_order')
                ? $this->integer('sort_order')
                : null,
        );
    }

}
