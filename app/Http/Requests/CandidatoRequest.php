<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
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
            
            'nome' => 'string|required|max:254',
            'data' => 'required|date|after_or_equal:1910-01-01',
            'nat_cidade'=> 'string|required|max:254',
            'rua'=> 'string|required|max:254',
            'bairro'=> 'string|required|max:254',
            'cidade'=> 'string|required|max:254',
            'estado'=> 'string|required|max:254',
            'cep'=> 'string|required|max:254',
            'tel' => 'required',            
            'cidade' => 'string|required|max:25',
            'estado' => 'required',
            'turno'=> 'required',
            'nomef1'=> 'string|required|max:254',
            'nomef2'=> 'string|required|max:254',
            'dataf1'=> 'required|date|after_or_equal:1910-01-01',
            'dataf2'=> 'required|date|after_or_equal:1910-01-01',
            'cidadef1'=> 'string|required|max:254',
            'cidadef2'=> 'string|required|max:254',
            'estadof1'=> 'string|required|max:254',
            'estadof2'=> 'string|required|max:254',
            'documento.*' => 'required|file|mimes:jpeg,jpg,pdf,PDF|max:5000',
            'documento_opcional.*' => 'file|mimes:jpeg,jpg,pdf,PDF|max:5000',//5MB
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Campo Obrigatório',
            'required_if' => 'Campo Obrigatório',
            'digits_between' => 'Min. de :min e max. :max digitos',
            'min' => 'Mínimo de :min de caracteres',
            'max' => 'Limite de :max caracteres',
            'numeric' => 'Somente números',
            'mimes' => 'O documento deve ser formato:jpeg,jpg,pdf',
        ];
    }
}
