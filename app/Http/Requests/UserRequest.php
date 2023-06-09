<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'nullable|integer',
            'last_name' => 'nullable|integer',
            'middle_name' => 'nullable|integer',
            'phone_number' => 'nullable|integer',
            'avatar' => 'nullable|numeric',
            'status_id' => 'nullable|integer',
            'gender' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'login' => 'required|array|unique:yy_personal_infos',
            'password' => 'required|array|confirmed',
            'role_id' => 'required|array',
            'company_id' => 'nullable|array',
        ];
    }
}
