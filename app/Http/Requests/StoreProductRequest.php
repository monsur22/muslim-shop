<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreProductRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            $rules['name'] = 'required|string|max:255';
            $rules['category_id'] = 'required|exists:categories,id';
            $rules['supplier_id'] = 'required|exists:users,id';
            $rules['brand_id'] = 'nullable|exists:brands,id';
            $rules['store_id'] = 'nullable|exists:stores,id';
            $rules['user_id'] = 'required|exists:users,id';
            $rules['price'] = 'required|integer';
            $rules['expire_date'] = 'nullable|date';
            $rules['status'] = 'required|boolean';
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $rules['description'] = 'required|string';
        } else {
            $rules['name'] = 'sometimes|string|max:255';
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
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
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 255 characters.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'supplier_id.required' => 'The supplier is required.',
            'supplier_id.exists' => 'The selected supplier is invalid.',
            'brand_id.exists' => 'The selected brand is invalid.',
            'wire_house_id.exists' => 'The selected warehouse is invalid.',
            'user_id.required' => 'The user is required.',
            'user_id.exists' => 'The selected user is invalid.',
            'price.required' => 'The price is required.',
            'price.integer' => 'The price must be an integer.',
            'expire_date.date' => 'The expiration date is not a valid date.',
            'status.required' => 'The status is required.',
            'status.boolean' => 'The status must be true or false.',
            'image.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
    }
}
