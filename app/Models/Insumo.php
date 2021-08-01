<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/*class Insumo extends Model
{
    use HasFactory;
    protected $table = 'insumo';
}
}*/

class Insumo extends Authenticable
{
    use Notifiable;
    use SoftDeletes; 
    protected $table = "insumo";
    protected $primaryKey = "cod_insu";
    public $incrementing = true;

    public function plato(){
        return $this->belongsToMany('App\Models\Plato','insumo_plato');
    }

    public function comandas(){
        return $this->belongsToMany('App\Models\Comanda','cod_comanda');
    }
    
}
