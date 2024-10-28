<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiperRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Assuming you're passing the shipper ID in the route as 'shipper'
        $shipperId = $this->route('shipperdashboard'); // Adjust the parameter name based on your routes
        return [
            'name' => 'required|string|max:255|unique:shipers,name,' . $shipperId, // Update to exclude current shipper
            'country' => 'required|string|max:30',
            'phone' => 'required|string|unique:shipers,phone,' . $shipperId, // Update to exclude current shipper for phone
            'img' => 'nullable|image|max:5120|mimes:png,jpg',
        ];
    }
}
