<?php

namespace App\Rules;

use App\Models\TipoUsuario as ModelsTipoUsuario;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TipoUsuario implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(ModelsTipoUsuario::find($value) == null){
            $fail("Tipo de usuario enviado no existe");
        }
    }
}
