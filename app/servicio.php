<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    protected $table= "servicio";
    
        protected $fillable = [
            'id_servicio',
            'nombre_servicio',
            'empresa_id_empresa',
            'empresa_usuario_id',
            'categoria_id_categoria',
            'categoria_area_id_area'
        ];
}