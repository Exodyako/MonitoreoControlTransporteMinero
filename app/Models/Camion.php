<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $table = "camion";
    protected $primaryKey = 'ca_id';
    public function conductor(){
        // $conductor = Conductor::where("co_id", $this->ca_conductor)->firts();
        // return $conductor;

        return $this->belongsTo(related:Conductor::class,foreignKey:"ca_conductor");
    }
}
