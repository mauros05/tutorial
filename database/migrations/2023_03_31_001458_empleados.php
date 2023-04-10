<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table){
            $table->id();
            $table->string('nombre', 40);
            $table->string('ap_pat', 40);
            $table->string('ap_mat', 40);
            $table->string('direccion', 80);
            $table->string('numero_telefono', 10);
            $table->integer('id_tipo_empleado');
            $table->string('genero',1);
            $table->string('email', 40)->unique();
            $table->string('password');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
