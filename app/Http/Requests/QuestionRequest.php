<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    protected $errorBag = 'question';

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
                $this->errorBag = 'questionPost';
                return [
                    'text' => 'required',
                    'answer_text.*' => 'required',
                    'true' => 'required'
                ];
                break;
            case 'PATCH':
                $this->errorBag = 'questionPatch';
                return [
                    'text' => 'required',
                    'answer_text.*' => 'required',
                    'true' => 'required'
                ];
              break;
            default:
                return [];
                break;
        }
    }

    public function messages()
    {
        return [
            'text.required' => 'Pertanyaan harus diisi.',
            'answer_text.0.required' => 'Jawaban A harus diisi.',
            'answer_text.1.required' => 'Jawaban B harus diisi.',
            'answer_text.2.required' => 'Jawaban C harus diisi.',
            'answer_text.3.required' => 'Jawaban D harus diisi.',
            'true.required' => 'Pilih jawaban benar.'
        ];
    }
}
