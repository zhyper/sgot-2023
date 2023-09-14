<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioMapa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 't_servicio_mapa';


    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
