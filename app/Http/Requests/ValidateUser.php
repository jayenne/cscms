<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
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

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'username' => 'required',
                        'email'      => 'required|unique:users,id',
                        'roles' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'username' => 'required',
                        'email'      => 'required|unique:users,id' . $this->get('id'),
                        'roles' => 'required',
                    ];
                }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'username.required' => 'you must enter a username dummy'
        ];
    }
}
