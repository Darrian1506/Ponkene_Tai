<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boleta extends Authenticable
{
    use Notifiable;
    protected $table = "boleta";
    protected $primaryKey = "cod_boleta";
    public $incrementing = true;
    
}
