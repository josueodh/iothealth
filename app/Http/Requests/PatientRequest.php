<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|min:6|string',
            'number' => 'required|numeric',
            'phone' => 'required|min:14',
            'street' => 'required',
            'city' => 'required|min:3',
            'state' => 'required',
            'cep' => 'required|min:9',
            'neighborhood' => 'required|min:3',
            'born_date' => 'required|date',
            'pathology' => 'required|min:5',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'e-mail',
            'number' => 'número',
            'phone' => 'telefone',
            'street' => 'rua',
            'city' => 'cidade',
            'state' => 'estado',
            'cep' => 'CEP',
            'neighborhood' => 'bairro',
            'born_date' => 'data de nascimento',
            'pathology' => 'patologia'
        ];
    }
}
