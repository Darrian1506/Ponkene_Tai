<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comanda extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = "comanda";
    protected $primaryKey =  "cod_comanda";
    public $incrementing = true;

    public function insumos(){
        return $this->belongsToMany('App\Models\Insumo', 'comanda_insumo','cod_insu','cod_comanda');
    }

    public function promociones(){
        return $this->belongsToMany('App\Models\Promocion', 'cod_promo');
    }

    public function platos(){
        return $this->belongsToMany('App\Models\Plato', 'cod_plato');
    }
}
