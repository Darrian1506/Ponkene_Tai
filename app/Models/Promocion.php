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
<<<<<<< HEAD

    public function cocina(){
        return $this->belongsToMany('App\Models\Cocina','comanda_promocion');
=======
    public function comandas(){
        return $this->belongsToMany('App\Models\Comanda','comanda_promocion','cod_promo','cod_comanda')->withPivot(['cantidad']);
>>>>>>> d77ec467ef07e5f09e15644aa4aa9784cef66414
    }
    
}
