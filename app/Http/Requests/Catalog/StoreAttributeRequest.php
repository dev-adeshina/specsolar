<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\AttributeDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StoreAttributeRequest extends FormRequest
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
            'attribute_group_id' => [
                'required',
                'exists:attribute_groups,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
                'unique:attributes,name',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:attributes,slug',
            ],

            'data_type' => [
                'required',
                'string',
                'max:50',
            ],

            'unit' => [
                'nullable',
                'string',
                'max:50',
            ],

            'is_filterable' => [
                'boolean',
            ],

            'is_searchable' => [
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function toDTO(): AttributeDTO
    {
        return new AttributeDTO(
            attribute_group_id: $this->integer('attribute_group_id'),
            name: $this->string('name')->toString(),
            slug: $this->string('slug')->toString(),
            data_type: $this->string('data_type')->toString(),
            unit: $this->string('unit')->toString(),
            is_filterable: $this->boolean('is_filterable'),
            is_searchable: $this->boolean('is_searchable'),
            sort_order: $this->filled('sort_order')
                ? $this->integer('sort_order')
                : null,
        );
    }
}
