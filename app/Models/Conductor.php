<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;
    protected $table = "conductor";
    protected $primaryKey = 'co_id';
    public function camion(){
        return $this->hasOne(related:Camion::class,foreignKey:"ca_conductor");
    }
}
