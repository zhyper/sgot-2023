<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapaPlan extends Model
{
    use HasFactory;
    protected $table = 'mapa_plan';

    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}

