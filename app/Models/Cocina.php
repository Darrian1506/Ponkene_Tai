<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cocina extends Authenticable
{
    use SoftDeletes;
    use Notifiable;
    protected $table = "comanda";
    protected $primaryKey =  "cod_comanda";
    public $incrementing = true;

    public function mesa(){
        return $this->belongsTo('App\Models\Mesa');
    }

}