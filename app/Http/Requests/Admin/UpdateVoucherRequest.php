<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVoucherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $voucherId = $this->route('voucher')?->id ?? $this->route('voucher');

        return [
            'code'          => ['required', 'string', 'max:50', Rule::unique('vouchers', 'code')->ignore($voucherId)],
            'scope'         => ['required', Rule::in(['site_wide', 'products', 'categories'])],
            'discount_type' => ['required', Rule::in(['percentage', 'fixed'])],
            'discount_value'=> ['required', 'numeric', 'min:0.01',
                                Rule::when($this->discount_type === 'percentage', ['max:100'])],
            'usage_limit'   => ['nullable', 'integer', 'min:1'],
            'expires_at'    => ['nullable', 'date'],
            'is_active'     => ['boolean'],
            'product_ids'   => ['nullable', 'array'],
            'product_ids.*' => ['integer', 'exists:products,id'],
            'category_ids'  => ['nullable', 'array'],
            'category_ids.*'=> ['integer', 'exists:categories,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required'      => 'A voucher code is required.',
            'code.unique'        => 'This voucher code is already in use.',
            'discount_value.max' => 'Percentage discount cannot exceed 100%.',
        ];
    }
}
