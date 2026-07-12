<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // AdminMiddleware already guards the route
    }

    public function rules(): array
    {
        return [
            'category_id'      => ['required', 'integer', 'exists:categories,id'],
            'brand_id'         => ['nullable', 'integer', 'exists:brands,id'],
            'name'             => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')],
            'description'      => ['nullable', 'string'],
            'price'            => ['required', 'numeric', 'min:0'],
            'stock'            => ['required', 'integer', 'min:0'],
            'is_featured'      => ['boolean'],
            'specifications' => ['nullable', 'array'],
            'images'           => ['nullable', 'array'],
            'images.*'         => ['image', 'max:5120'], // 5MB per image
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'name.required'        => 'Product name is required.',
            'price.required'       => 'Price is required.',
            'price.min'            => 'Price cannot be negative.',
            'stock.required'       => 'Stock quantity is required.',
            'stock.min'            => 'Stock cannot be negative.',
            'images.*.image'       => 'Each file must be a valid image.',
            'images.*.max'         => 'Each image may not exceed 5MB.',
        ];
    }
}
