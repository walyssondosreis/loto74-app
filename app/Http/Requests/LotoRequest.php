<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'concursos' => ['nullable','regex:/^\d+(,\d+)?$|^\d+(\s+\d+)?$/'],
            // 'concursos' => ['nullable','regex:/^\d*\s*\,{0,1}\s*\d*\s*$/'],
            // 'concursos' => ['nullable'],
            // falar que não pode ser 0
        ];
    }
    public function messages()
    {
        return [
            // 'concursos.regex'=>'O campo concursos é inválido para pesquisa',
        ];
    }
}
