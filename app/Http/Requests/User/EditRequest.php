<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
                'name' => ['required', 'string', 'max: 20'],
                'email' => ['required', 'string', 'max: 40'],
                'is_admin' => ['required', 'boolean'],
            ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute необходимо заполнить.'
        ];
    }

    public function attributes()
    {
        return parent::attributes();

        //['title' => 'Заголовок'];
    }
}
