<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'category_id' => [
                'nullable'
            ],
            'publisher_id' => [
                'nullable'
            ],
            'title' => [
                'required',
                'string'
            ],
            'author' => [
                'required',
                'string'
            ],
            'small_description' => [
                'required',
                'string'
            ],
            'abstract' => [
                'required',
                'string'
            ],
            'trending' => [
                'nullable'
            ],
            'status' => [
                'nullable'
            ],
            'image' => [
                'nullable',
                'mimes:png,jpg,jpeg'
            ],
        ];
    }
}
