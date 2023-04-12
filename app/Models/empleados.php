<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empleados extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 
                           'nombre',
                           'ap_pat', 
                           'ap_mat', 
                           'direccion', 
                           'numero_telefono', 
                           'id_tipo_empleado', 
                           'genero', 'email', 
                           'password',
                           'edad',
                           'salario',
                           'imagen'
                        ];
}
