<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCamion extends Model
{
    use HasFactory;
    protected $table = "tipo_camion";

    public function camiones(){
        return $this->hasMany(related:Camion::class,foreignKey:"ca_tipo");
    }
}
