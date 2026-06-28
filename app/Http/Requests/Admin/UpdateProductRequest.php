<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id ?? $this->route('product');

        return [
            'category_id'      => ['required', 'integer', 'exists:categories,id'],
            'brand_id'         => ['nullable', 'integer', 'exists:brands,id'],
            'name'             => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($productId)],
            'description'      => ['nullable', 'string'],
            'price'            => ['required', 'numeric', 'min:0'],
            'stock'            => ['required', 'integer', 'min:0'],
            'is_featured'      => ['boolean'],
            'specifications'   => ['nullable', 'array'],
            // New gallery images to append
            'images'           => ['nullable', 'array'],
            'images.*'         => ['image', 'max:5120'],
            // IDs of existing images to delete
            'delete_images'    => ['nullable', 'array'],
            'delete_images.*'  => ['integer', 'exists:product_images,id'],
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
            'images.*.image'       => 'Each file must be a valid image.',
            'images.*.max'         => 'Each image may not exceed 5MB.',
        ];
    }
}
