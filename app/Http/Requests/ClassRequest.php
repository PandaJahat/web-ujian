<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
{

    protected $errorBag = 'class';

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
          case 'POST':
            $this->errorBag = 'classPost';
            return [
                'code' => 'required|unique:classes',
                'name' => 'required'
            ];
          break;
          case 'PUT':
          case 'PATCH':
            $this->errorBag = 'classPatch';
            return [
                'code' => 'required|unique:classes,code,'.$this->id,
                'name' => 'required'
            ];
          break;
          default:

          break;
        }
    }

    public function messages()
    {
      return [
          'code.unique' => 'Kode kelas telah digunakan, silahkan masukan kode kelas lain.',
          'name.required' => 'Nama kelas harus diisi.'
      ];
    }
}
