<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;
    protected $table = "trabajador";
    protected $primaryKey = 'co_id';
    public function camion(){
        return $this->hasOne(related:Camion::class,foreignKey:"ca_trabajador");
    }

    public function tickets(){
        return $this->hasMany(related:TicketBascula::class,foreignKey:"tc_vehiculo");
    }

    public function usuario(){
        return $this->hasOne(related:Usuario::class,foreignKey:"us_trabajador");
    }
}
