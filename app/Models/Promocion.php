<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocion extends Authenticable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'promocion';
    protected $primaryKey = 'cod_promo';
    public $incrementing = true;
    
    
    public function plato(){
        return $this->belongsToMany('App\Models\Plato','plato_promocion','cod_promo','cod_plato')->withPivot(['cantidad']);
    }
    public function comandas(){
        return $this->belongsToMany('App\Models\Comanda','cod_comanda');
    }
    
}
