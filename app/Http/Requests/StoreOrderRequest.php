<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreOrderRequest extends FormRequest
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
        $rules = [
            'type' => 'required|in:ecommerce,inventory',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method_id' => 'required|integer',
            // 'payment_method_id' => 'required_if:type,ecommerce|integer|nullable',

        ];

        if ($this->input('type') === 'ecommerce') {
            $rules = array_merge($rules, [
                'shipping_address.address_line1' => 'required|string|max:255',
                'shipping_address.address_line2' => 'nullable|string|max:255',
                'shipping_address.city' => 'required|string|max:255',
                'shipping_address.state' => 'required|string|max:255',
                'shipping_address.postal_code' => 'required|string|max:20',
                'shipping_address.country' => 'required|string|max:255',
            ]);
        }

        return $rules;

    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], 422));
    }
    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'items.required' => 'The order must include at least one item.',
            'items.array' => 'The items field must be an array.',
            'items.min' => 'The order must include at least one item.',
            'items.*.product_id.required' => 'Each item must have a product associated with it.',
            'items.*.product_id.exists' => 'The selected product does not exist.',
            'items.*.quantity.required' => 'Each item must specify a quantity.',
            'items.*.quantity.integer' => 'The quantity must be an integer value.',
            'items.*.quantity.min' => 'The quantity must be at least 1.',
            'payment_method_id.required' => 'The payment method must be required.',
            'payment_method_id.integer' => 'The payment method must be an integer value.',
            //for address validation message
            'shipping_address.address_line1.required' => 'The address line 1 is required for ecommerce orders.',
            'shipping_address.address_line1.string' => 'The address line 1 must be a string.',
            'shipping_address.address_line1.max' => 'The address line 1 must not exceed 255 characters.',
            'shipping_address.address_line2.string' => 'The address line 2 must be a string.',
            'shipping_address.address_line2.max' => 'The address line 2 must not exceed 255 characters.',
            'shipping_address.city.required' => 'The city is required for ecommerce orders.',
            'shipping_address.city.string' => 'The city must be a string.',
            'shipping_address.city.max' => 'The city must not exceed 255 characters.',
            'shipping_address.state.required' => 'The state is required for ecommerce orders.',
            'shipping_address.state.string' => 'The state must be a string.',
            'shipping_address.state.max' => 'The state must not exceed 255 characters.',
            'shipping_address.postal_code.required' => 'The postal code is required for ecommerce orders.',
            'shipping_address.postal_code.string' => 'The postal code must be a string.',
            'shipping_address.postal_code.max' => 'The postal code must not exceed 20 characters.',
            'shipping_address.country.required' => 'The country is required for ecommerce orders.',
            'shipping_address.country.string' => 'The country must be a string.',
            'shipping_address.country.max' => 'The country must not exceed 255 characters.',
        ];
    }
}
