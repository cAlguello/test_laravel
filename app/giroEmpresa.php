<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giroEmpresa extends Model
{
    protected $table= "empresa_has_giro";
    
    protected $fillable = [
        'empresa_id_empresa',
        'giro_id_giro'
    ];
}
