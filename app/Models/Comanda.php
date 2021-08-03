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
        return $this->belongsToMany('App\Models\Insumo', 'comanda_insumo', 'cod_comanda', 'cod_insu')->withPivot(['cantidad']);
    }

    public function promociones(){
        return $this->belongsToMany('App\Models\Promocion', 'comanda_promocion','cod_comanda','cod_promo')->withPivot(['cantidad']);
    }

    public function platos(){
        return $this->belongsToMany('App\Models\Plato', 'comanda_plato','cod_comanda','cod_plato')->withPivot(['cantidad', 'descripcion']);
    }
}
