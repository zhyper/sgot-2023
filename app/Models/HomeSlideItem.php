<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlideItem extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'title',
    //     'short_title',
    //     'image',
    //     'url',
    //     'slide_id',
    // ];

    protected $table ='home_slide_items';


    public function slide(){
        return $this->belongsTo(HomeSlide::class);
    }
}
