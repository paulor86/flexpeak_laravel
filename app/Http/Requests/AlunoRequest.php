<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
            'nome'=> 'required|max:50',
            'data_nascimento'=> 'required|date',
            'logradouro'=> 'required|max:100',
            'numero'=> 'required|max:5',
            'bairro'=> 'required|max:50',
            'cidade'=> 'required|max:50',
            'estado'=> 'required|max:50',
            'cep'=> 'required|max:11',
            'curso_id'=> 'required',
        ];
    }
    public function messages()
    {
        return[
            'data_nascimento.required'=>'O campo Data de Nascimento é obrigatório'
        ];
    }
}
