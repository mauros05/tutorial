<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['id',
                           'nombre',
                           'ap_pat',
                           'ap_mat',
                           'email',
                           'password',
                           'tipo',
                           'activo'                        
                        ];
}
