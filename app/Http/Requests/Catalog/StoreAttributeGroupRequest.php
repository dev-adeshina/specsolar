<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\AttributeGroupDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeGroupRequest extends FormRequest
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
            ],

            'sort_order' => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function toDTO(): AttributeGroupDTO
    {
        return new AttributeGroupDTO(
            name: $this->string('name')->value(),
            sort_order: $this->integer('sort_order') ? $this->integer('sort_order')
            : null,
        );
    }

    public function messages(): array 
    {
        return [
            //to be filled later
        ];
    }
}
