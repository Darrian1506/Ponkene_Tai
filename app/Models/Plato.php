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
    public $timestamps = false;

    public function insumo(){
        return $this->belongsToMany('App\Model\Insumo','cod_insu');
    }
}
