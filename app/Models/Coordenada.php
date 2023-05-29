<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;

class Coordenada extends Model
{
    use HasFactory;
    protected $table = "coordenada";
    protected $primaryKey = "coo_id";
    
    protected $casts = [
        'coo_coordenada' => Point::class
    ];

    
    public function camion(){
        return $this->belongsTo(related:Camion::class,foreignKey:"coo_camion");
    }

    public function ruta(){
        return $this->belongsTo(related:Ruta::class,foreignKey:"coo_ruta");
    }

    public function puntoInteres(){
        return $this->belongsTo(related:PuntoInteres::class,foreignKey:"coo_punto_interes");
    }
}
