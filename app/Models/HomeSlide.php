<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    use HasFactory;

    protected $guard = [];

    protected $table ='home_slides';

    // protected $fillable = [
    //     'nombre',
    //     'tipo',
    // ];

    public function slides(){
        return $this->hasMany(HomeSlideItem::class);
    }
}
