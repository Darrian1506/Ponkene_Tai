<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesa extends Authenticable
{
    use SoftDeletes;
    use Notifiable;
    protected $table = "mesa";
    protected $primaryKey =  "cod_mesa";
    public $incrementing = false;

    public function cocina(){
        return $this->hasMany('App\Models\Cocina');
    }

}
