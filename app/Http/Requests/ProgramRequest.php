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
                    'code' => 'required|unique:programs,code',
                    'name' => 'required',
                    'faculty_id' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {   
                $this->errorBag = 'update';
                return [
                    'code' => 'required|unique:programs,code,'.$this->id,
                    'name' => 'required',
                    'faculty_id' => 'required'
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
            'code.required' => 'Kode jurusan wajib diisi.',
            'code.unique' => 'Kode jurusan sudah digunakan, silahkan gunakan kode jurusan lain.',            
            'name.required' => 'Nama jurusan wajib diisi.',
            'faculty_id.required' => 'Fakultas wajib dipilih.'
        ];
    }
}
