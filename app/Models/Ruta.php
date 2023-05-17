<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = "ruta";
    public function coordenadas(){
        return $this->hasMany(related:Coordenada::class,foreignKey:"coo_ruta");
    }

    public function historialesRuta(){
        return $this->hasMany(related:HistorialRuta::class,foreignKey:"hr_ruta");
    }
}
