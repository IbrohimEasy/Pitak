<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'nullable|integer',
            'passport_serial_number' => 'nullable|string',
            // 'passport_images' => 'nullable|json',
            'passport_issued_by' => 'nullable|date',
            'passport_expired_date' => 'nullable|date',
            'license_number' => 'nullable|string',
            // 'license_image' => 'nullable|json',
            'license_expired_date' => 'nullable|date',
        ];
    }
}
