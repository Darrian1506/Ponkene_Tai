<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reserva extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = "reserva";
    protected $primaryKey = "cod_reserva";
    public $incrementing = true;

    public function empleado(){
        return $this->belongsTo('App\Models\Empleado', 'rut');
    }
}
