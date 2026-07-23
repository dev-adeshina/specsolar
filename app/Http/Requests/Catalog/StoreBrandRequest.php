<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\BrandDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Shared\Validation\ImageRules;



class StoreBrandRequest extends FormRequest
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
           'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'logo' => ImageRules::upload(),
            'website' => ['nullable', 'url', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required'],
        ];
    }

    public function toDTO(): BrandDTO
    {
        return new BrandDTO(
            name: $this->string('name')->value(),
            slug: $this->string('slug')->value(),
            logo: $this->file('logo'),
            // logo_url: null,
            website: $this->string('website')->value(),
            country: $this->string('country')->value(),
            description: $this->string('description')->value(),
            status: $this->string('status')->value(),
        );
    }

    public function messages(): array
    {
        return [
            'logo.max' => 'The selected logo must not be larger than 2 MB.',
            'logo.image' => 'Please upload a valid logo.',
            'logo.required' => 'Please choose a logo.',
            'logo.uploaded' => 'The selected logo could not be uploaded. Please make sure it is no larger than 2 MB.',
        ];
    }
}
