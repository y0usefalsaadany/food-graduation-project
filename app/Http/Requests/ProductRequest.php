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
            'photo' => 'required|image|mimes:png,jpg,jpeg',
            'name' => 'required|string|between:2,100',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
        ];
    }
}
