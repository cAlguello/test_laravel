<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giro extends Model
{
    protected $table= "giro";
    
    protected $fillable = [
        'id_giro',
        'nombre_giro',
        'area_giro_id_area_giro'
    ];
}
