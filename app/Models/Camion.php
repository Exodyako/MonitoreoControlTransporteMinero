<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $table = "camion";
    protected $primaryKey = 'ca_id';
    public function trabajador(){
        // $conductor = Conductor::where("co_id", $this->ca_conductor)->firts();
        // return $conductor;

        return $this->belongsTo(related:Conductor::class,foreignKey:"ca_trabajador");
    }

    public function tipoCamion (){
        return $this->belongsTo(related:TipoCamion::class,foreignKey:"ca_tipo");
    }

    public function coordenadas(){
        return $this->hasMany(related:Coordenada::class,foreignKey:"coo_camion");
    }

    public function tickets(){
        return $this->hasMany(related:TicketBascula::class,foreignKey:"tc_vehiculo");
    }
}
