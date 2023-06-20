<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'id' => 'sometimes|numeric|unique:users,id',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(request()->route()?->student?->id),
            ],
            'email_verified_at' => 'nullable|date',
            'password' => 'nullable|string',
            'two_factor_secret' => 'nullable|string',
            'two_factor_recovery_codes' => 'nullable|string',
            'remember_token' => 'nullable|string',
            'profile_photo_path' => 'nullable|string',
            'current_team_id' => 'nullable|integer',
        ];
    }
}
