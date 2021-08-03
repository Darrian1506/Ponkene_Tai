<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Authenticable
{
    use Notifiable;
    protected $table = "boleta";
    protected $primaryKey = "cod_bolera";
    public $incrementing = true;
    
}
