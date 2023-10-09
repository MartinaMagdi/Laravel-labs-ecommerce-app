<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        return [
            'name' => [
                'required', Rule::unique('categories')->ignore($this->category),
                'min:3'
            ],
            'logo' => "mimes:png,jpg,jpeg"
        ];
    }

    function messages()
    {
        return [
            'name.required' => "Category name is required.",
            'name.min' => "Category name must more than 2 characters.",
            'logo.mimes' => 'Logo must be an image with type "png, jpg or jpeg"'
        ];
    }
}
