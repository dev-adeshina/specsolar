<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\CategoryDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Shared\Validation\ImageRules;

class StoreCategoryRequest extends FormRequest
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
            'parent_id' => ['nullable', 'integer'],
            'name' => ['required','string','max:255'],
            'slug' => ['required','string'],
            'description' => ['required','string'],
            'icon' => ['required','string'],
            'image' => ImageRules::upload(),
            'status' => ['required'],
        ];
    }

    public function toDTO(): CategoryDTO
    {
        return new CategoryDTO(
            parent_id: $this->integer('parent_id'),
            name: $this->string('name')->value(),
            slug: $this->string('slug')->value(),
            description: $this->string('description')->value(),
            icon: $this->string('icon')->value(),
            image: $this->file('image'),
            image_url: null,
            sort_order: $this->filled('sort_order') ? $this->integer('sort_order'): 0,
            status: $this->string('status')->value(),
        );
    }

    public function messages()
    {
        return [

            'image.max' => 'The selected image must not be larger than 2 MB.',

            'image.image' => 'Please upload a valid image.',

            'image.required' => 'Please choose an image.',

            'image.uploaded' => 'The selected image could not be uploaded. Please make sure it is no larger than 2 MB.',


        ];
    }
}