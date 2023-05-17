<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialRuta extends Model
{
    use HasFactory;
    protected $table = "historial_ruta";

    public function ruta(){
        return $this->belongsTo(related:Ruta::class,foreignKey:"hr_ruta");
    }
    public function coordenadas(){
        return $this->hasMany(related:Coordenada::class,foreignKey:"coo_historial");
    }
    public function ticket(){
        return $this->hasMany(related:TicketBascula::class,foreignKey:"tc_historial_ruta");
    }
}
