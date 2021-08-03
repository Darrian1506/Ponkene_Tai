<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plato extends Authenticable
{
    use SoftDeletes;
    use Notifiable;
    protected $table = "plato";
    protected $primaryKey =  "cod_plato";
    public $incrementing = true;
    

    public function insumo(){
        return $this->belongsToMany('App\Models\Insumo','insumo_plato','cod_plato','cod_insu');
    }

    public function promocion(){
        return $this->belongsToMany('App\Models\Promocion','plato_promocion');
    }

    public function cocina(){
        return $this->belongsToMany('App\Models\Cocina','comanda_plato');
    }
    
    public function comandas(){
        return $this->belongsToMany('App\Models\Comanda','comanda_plato','cod_plato','cod_comanda')->withPivot(['cantidad', 'descripcion']);
    }
}
