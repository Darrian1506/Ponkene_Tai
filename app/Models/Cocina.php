<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cocina extends Authenticable
{
    use Notifiable;
<<<<<<< HEAD
    protected $table = "comanda";
    protected $primaryKey =  "cod_comanda";
    public $incrementing = true;

    public function mesa(){
        return $this->belongsTo('App\Models\Mesa');
    }
    public function plato(){
        return $this->belongsToMany('App\Models\Plato','comanda_plato','cod_comanda','cod_plato')->withPivot(['cantidad']);
    }
    public function promocion(){
        return $this->belongsToMany('App\Models\Promocion','comanda_promocion','cod_comanda','cod_promo')->withPivot(['cantidad']);
    }
=======
>>>>>>> d77ec467ef07e5f09e15644aa4aa9784cef66414

}