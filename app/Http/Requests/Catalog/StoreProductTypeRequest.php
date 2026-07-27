<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\ProductTypeDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;




class StoreProductTypeRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:product_types,name',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:product_types,slug',
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
