<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    protected $table = "tipo_usuario";
    protected $primaryKey = 'tu_id';

    public function usuario(){
        return $this->hasMany(related:Usuario::class,foreignKey:"us_tipo");
    }

    
}
