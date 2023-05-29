<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoInteres extends Model
{
    use HasFactory;
    
    protected $table = "punto_interes";     
    protected $primaryKey  = 'pi_id';  
    
    public function coordenada(){
        return $this->hasOne(related:Coordenada::class,foreignKey:"coo_punto_interes");
    }
}
