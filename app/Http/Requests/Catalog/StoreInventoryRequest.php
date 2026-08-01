<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\InventoryDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;



class StoreInventoryRequest extends FormRequest
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
            'product_id'    => ['required', 'integer', 'exists:products,id'],
            'quantity'      => ['sometimes', 'integer', 'min:0'],
            'reserved'      => ['sometimes', 'integer', 'min:0'],
            'minimum_stock' => ['sometimes', 'integer', 'min:0'],
            'reorder_level' => ['sometimes', 'integer', 'min:0'],
        ];
    }

    public function toDTO(): InventoryDTO
    {
        return new InventoryDTO(
            product_id: (int) $this->input('product_id'),

            quantity: (int) $this->input('quantity', 0),
            reserved: (int) $this->input('reserved', 0),
            minimum_stock: (int) $this->input('minimum_stock', 0),
            reorder_level: (int) $this->input('reorder_level', 0),
        );
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Product id is required.',
            'product_id.exists'   => 'Selected product does not exist.',

            'quantity.integer'    => 'Quantity must be an integer.',
            'quantity.min'        => 'Quantity must be at least 0.',

            'reserved.integer'    => 'Reserved must be an integer.',
            'reserved.min'        => 'Reserved must be at least 0.',

            'minimum_stock.integer' => 'Minimum stock must be an integer.',
            'minimum_stock.min'     => 'Minimum stock must be at least 0.',

            'reorder_level.integer' => 'Reorder level must be an integer.',
            'reorder_level.min'     => 'Reorder level must be at least 0.',
        ];
    }
}
