<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    use HasFactory;
    protected $table = "coordenada";

    public function camion(){
        return $this->belongsTo(related:Camion::class,foreignKey:"coo_camion");
    }

    public function ruta(){
        return $this->belongsTo(related:Ruta::class,foreignKey:"coo_ruta");
    }

    public function historialRuta(){
        return $this->belongsTo(related:HistorialRuta::class,foreignKey:"coo_historial");
    }

    public function puntoInteres(){
        return $this->belongsTo(related:PuntoInteres::class,foreignKey:"coo_punto_interes");
    }
}
