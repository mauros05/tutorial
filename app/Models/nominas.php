<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nominas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['id',
                           'fecha',
                           'monto',
                           'dias_trabajados',
                           'id_empleado'];
}
