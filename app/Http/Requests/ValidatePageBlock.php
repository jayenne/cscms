<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePageBlock extends FormRequest
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
            //
            'user_id' => 'required|integer',
            'page_id' => 'required|interger',
            'block_lid' => 'required|max:255',
            'block_name' => 'max:255',
        ];

    }

    public function messages()
    {
        return [
            'page_id.required' => 'you must enter a page for this block.',
        ];
    }
}
