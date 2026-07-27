<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\ProductTypeDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class UpdateProductTypeRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_types', 'name')->ignore(
                    $this->route('productType')
                ),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_types', 'slug')->ignore(
                    $this->route('productType')
                ),
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ];
    }


    public function toDTO(): ProductTypeDTO
    {
        return new ProductTypeDTO(
            name: $this->string('name')->toString(),
            slug: $this->string('slug')->toString(),
            description: $this->string('description')->toString(),
        );
    }
}
