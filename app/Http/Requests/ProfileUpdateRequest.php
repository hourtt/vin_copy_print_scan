<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'   => ['sometimes', 'required', 'string', 'max:255'],
            'last_name'    => ['sometimes', 'required', 'string', 'max:255'],
            'email'        => [
                'sometimes',
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'phone_number' => ['sometimes', 'nullable', 'string', 'max:20'],
            'address'      => ['sometimes', 'required', 'string', 'max:500'],
            'city'         => ['sometimes', 'required', 'string', 'max:255'],
            'state'        => ['sometimes', 'nullable', 'string', 'max:255'],
            'zip_code'     => ['sometimes', 'nullable', 'string', 'max:20'],
        ];
    }
}
