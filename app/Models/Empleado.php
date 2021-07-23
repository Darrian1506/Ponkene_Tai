<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

/*class Empleado extends Model
{
    use HasFactory;
}*/

class Empleado extends Authenticable
{
    use Notifiable;
    protected $table = "empleado";
    protected $primaryKey = "rut";
    public $incrementing = false;
    protected $keyType = "string";
}
