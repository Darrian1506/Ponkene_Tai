<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroHora extends Authenticable
{

    use Notifiable;
    protected $table = "registrar_hora";
    protected $primaryKey = ["fecha", 'rut', 'hora'];
    public $incrementing = false;

    public function empleado(){
        return $this->belongsTo('App\Models\Empleado', 'rut');
    }
}
