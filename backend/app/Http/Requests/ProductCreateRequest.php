<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'tension' => 'required',
            'brand' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor informar o nome.',
            'description.required' => 'Por favor informar a descrição.',
            'tension.required' => 'Por favor informar a tensão.',
            'brand.required' => 'Por favor informar a marca.'
        ];
    }
}
