<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{

    protected $errorBag = 'exam';

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
            case 'POST':
              $this->errorBag = 'examPost';
              return [
                    'name' => 'required|min:6',
                    'stop_at' => 'required|time_greater_than:start_at',
                    'start_at' => 'required'
              ];
            break;
            case 'PATCH':
              $this->errorBag = 'examPatch';
              return [
                    'name' => 'required|min:6',
                    'stop_at' => 'required|time_greater_than:start_at',
                    'start_at' => 'required'
              ];
            break;
            default:

            break;
        }
    }

    public function messages()
    {
      return [
        'name.min' => 'nama tidak boleh kurang dari 6 karakter.',
        'stop_at.time_greater_than' => 'Waktu mulai harus sebelum waktu berakhir.',
        'stop_at.required' => 'Waktu Akhir Ujian harus diisi.',
        'start_at.required' => 'Waktu Mulai Ujian harus diisi.'
      ];
    }
}
