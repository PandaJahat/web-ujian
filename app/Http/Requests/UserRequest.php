<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    protected $errorBag = 'user';

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
          case 'DELETE':
            return [];
          break;
          case 'POST':
            $this->errorBag = 'userPost';
            return [
                'name' => 'required',
                'username' => 'required|unique:users,username',
                'password' => 'required|confirmed|min:6'
            ];
          break;
          case 'PUT':
          case 'PATCH':
            $this->errorBag = 'userPatch';
            return [
                'name' => 'required',
                'username' => 'required|unique:users,username,'.$this->id,
                'password' => 'required|confirmed|min:6'
            ];
          break;
          default:

          break;
        }
    }

    public function messages()
    {
        return [
            'username.unique' => 'Username telah digunakan, silahkan masukan username lain.',
            'password.confirmed' => 'Password (ulangi) harus sama dengan password.',
            'password.min' => 'Password harus lebih dari 6 huruf.'
        ];
    }
}
