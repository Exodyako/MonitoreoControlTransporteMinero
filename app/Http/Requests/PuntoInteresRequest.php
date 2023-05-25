<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuntoInteresRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nombre"=>"required|max:100",
            "direccion"=>"required|max:100",
            "latitud"=>"required|decimal:1,13",
            "longitud"=>"required|decimal:1,13"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [                        
            "required"=>"Debe ingresar el campo ':attribute'",
            "decimal"=>"El valor :attribute debe tener una cantidad de decimales entre 1 y 13"            
        ];
    } 
}
