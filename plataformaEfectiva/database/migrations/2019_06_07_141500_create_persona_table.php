<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->string('id_persona');
            $table->string('codigo_empleado');
            $table->string('nombre_persona');
            $table->string('apellido_persona');
            $table->string('foto_persona');
            $table->integer('ciudad_persona');
            $table->string('telefono_persona');
            $table->string('correo_persona');
            $table->string('slug_persona');
            $table->string('estado_persona');
            $table->string('clave_persona');
            $table->integer('id_perfil'); 
            $table->string('creacion');
            $table->string('modificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
