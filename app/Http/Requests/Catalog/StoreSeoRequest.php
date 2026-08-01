<?php

namespace App\Http\Requests\Catalog;

use App\Domains\Catalog\DTOs\SeoDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StoreSeoRequest extends FormRequest
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
            'product_id' => ['required', 'integer'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],

            'canonical_url' => ['nullable', 'string', 'max:255'],

            'robots' => ['nullable', 'string', 'max:255'],

            'og_title' => ['nullable', 'string', 'max:255'],
            'og_description' => ['nullable', 'string'],
            'og_image' => ['nullable', 'string', 'max:255'],

            'twitter_title' => ['nullable', 'string', 'max:255'],
            'twitter_description' => ['nullable', 'string'],
            'twitter_image' => ['nullable', 'string', 'max:255'],

            'schema' => ['nullable', 'array'],
        ];
    }

    public function toDTO(): SeoDTO
    {
        return new SeoDTO(
            meta_title: $input['meta_title'] ?? null,
            meta_description: $input['meta_description'] ?? null,
            meta_keywords: $input['meta_keywords'] ?? null,

            canonical_url: $input['canonical_url'] ?? null,

            robots: $input['robots'] ?? 'index,follow',

            og_title: $input['og_title'] ?? null,
            og_description: $input['og_description'] ?? null,
            og_image: $input['og_image'] ?? null,

            twitter_title: $input['twitter_title'] ?? null,
            twitter_description: $input['twitter_description'] ?? null,
            twitter_image: $input['twitter_image'] ?? null,

            schema: $input['schema'] ?? null,
        );
    }

    public function DTO(array $input): SeoDTO
    {
        return $this->toDTO($input);
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Product id is required.',
            'product_id.integer' => 'Product id must be an integer.',
        ];
    }
}
