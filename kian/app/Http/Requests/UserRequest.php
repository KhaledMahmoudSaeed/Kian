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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userid = $this->route('userdashboard'); // Adjust the parameter name based on your routes
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userid,
            'phone' => 'required|string|max:15|unique:users,phone,' . $userid,
            'country' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',

        ];
    }
}
