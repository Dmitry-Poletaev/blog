<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'author' => 'required',
            'title' => 'required|unique:posts|max:355',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Укажите имя!',
            'title.required' => 'Укажите заголовок!',
            'title.max' => 'Заголовок слишком большой!',
            'body.max' => 'Пост не может быть пустым!',
        ];
    }
}
