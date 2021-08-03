<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroHora extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = "registrar_hora";
    protected $primaryKey = ["fecha", 'rut', 'hora'];
    public $incrementing = false;

    public function empleado(){
        return $this->belongsTo('App\Models\Empleado', 'rut');
    }
}
