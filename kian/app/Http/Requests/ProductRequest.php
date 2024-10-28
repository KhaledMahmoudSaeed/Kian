<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        // Assuming you're passing the product ID in the route as 'product'
        $productId = $this->route('productdashboard'); // Retrieve the product ID from the route
        return [
            'name' => 'required|string|max:255|unique:products,name,' . $productId,
            'description' => 'required|string|max:1000',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'sale' => 'nullable|integer',
            'img' => 'nullable|image|max:5120|mimes:png,jpg',
            'shiper_id' => 'required|integer',
        ];
    }
}
