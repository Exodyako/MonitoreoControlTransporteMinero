<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBascula extends Model
{
    use HasFactory;
    protected $table = "ticket_bascula";
    protected $primaryKey = 'tc_id';

    public function trabajador(){
        return $this->belongsTo(related:Trabajador::class,foreignKey:"tc_conductor");
    } 

    public function camion(){
        return $this->belongsTo(related:Camion::class,foreignKey:"tc_camion");
    }

}
