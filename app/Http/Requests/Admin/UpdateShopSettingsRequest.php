<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShopSettingsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_address' => ['nullable', 'string', 'max:500'],
            'shop_phone' => ['nullable', 'string', 'max:50'],
            'shop_email' => ['nullable', 'email', 'max:255'],
            'shop_description' => ['nullable', 'string'],
            'shop_logo' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
