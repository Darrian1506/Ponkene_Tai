<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

/*class Insumo extends Model
{
    use HasFactory;
    protected $table = 'insumo';
}
}*/

class Insumo extends Authenticable
{
    use Notifiable;
    protected $table = "insumo";
    protected $primaryKey = "cod_insu";
    public $incrementing = true;
    /*protected $keyType = "string";*/
}
