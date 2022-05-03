<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return
            [
                'category_id' => ['required', 'integer', 'exists:news'],
                'title' => ['required', 'string', 'min: 3', 'max: 50'],
                'status' => ['required', 'string', 'min:5', 'max:7'],
                'author' => ['required', 'string'],
                'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
                'description' => ['nullable', 'string']
            ];
    }

   
}

