<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class areaGiro extends Model
{
    protected $table= "area_giro";
    
    protected $fillable = [
        'id_area_giro',
        'nombre_area_giro'
    ];
}
