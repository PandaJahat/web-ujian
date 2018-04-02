<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

# Model
use App\Program;

class ProgramRequest extends FormRequest
{
    protected $errorBag = 'program';

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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                $this->errorBag = 'create';
                return [
                    'program_code' => 'required|unique:programs,program_code',
                    'program_name' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {   
                $this->errorBag = 'update';
                return [
                    'program_code' => 'required|unique:programs,program_code,'.$this->id,
                    'program_name' => 'required'
                ];
            }
            default:break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'program_code.required' => 'Kode jurusan wajib diisi.',
            'program_code.unique' => 'Kode jurusan sudah digunakan, silahkan gunakan kode jurusan lain.',            
            'program_name.required' => 'Nama jurusan wajib diisi.'            
        ];
    }
}
