<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey = 'us_id';

    protected $hidden = [
        'us_contrasenia',
        
    ];
    
    public function notificaciones(){
        return $this->hasMany(related:Notificacion::class,foreignKey:"no_usuario");
    }

public function trabajador(){
    return $this->belongsTo(related:Trabajador::class,foreignKey:"us_trabajador");
}

public function rol(){
    return $this->belongsTo(related:TipoUsuario::class,foreignKey:"us_tipo");
}
    }
