<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model 
{
    protected $table= "empresa";
    
    protected $fillable = [        
        'nombre_empresa',
        'direccion_empresa',
        'fono_empresa',
        'mail_empresa',
        'usuario_id'
    ];
}
