<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:projects',
            'description' => 'required|string',
            'url' => 'required|url',
            'programming_language' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'required|array|exists:technologies,id',
            'updated_on' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}