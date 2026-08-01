<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\ProductImageDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Shared\Validation\ImageRules;



class UpdateProductImageRequest extends FormRequest
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
        $id = (int) $this->route('product_image');
        return new ProductImageDTO(
            id: $id,
            product_id: (int) $this->input('product_id', $this->existingProductId()),
            image: $this->file('image',  $this->existingImage()),
            image_url: null,
            alt: $this->input('alt',  $this->existingAlt()),
            is_primary: (bool) $this->input('is_primary', $this->existingIsPrimary()),
            sort_order: (int) $this->input('sort_order', $this->existingSortOrder()),
        );
    }
    private function existingProductId(): int
    {
        return (int) optional($this->route('product_image'))->product_id;
    }

    private function existingImage(): ?string
    {
        return optional($this->route('product_image'))->image;
    }

    private function existingAlt(): ?string
    {
        return optional($this->route('product_image'))->alt;
    }

    private function existingIsPrimary(): bool
    {
        return (bool) optional($this->route('product_image'))->is_primary;
    }

    private function existingSortOrder(): int
    {
        return (int) optional($this->route('product_image'))->sort_order;
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
