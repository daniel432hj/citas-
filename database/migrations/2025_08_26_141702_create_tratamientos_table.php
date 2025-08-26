<?php

// En database/migrations/xxxx_create_tratamientos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('costo', 8, 2);
            $table->unsignedBigInteger('paciente_id'); // Clave foránea a pacientes
            $table->unsignedBigInteger('cita_id');    // Clave foránea a citas
            $table->timestamps();

            // Definimos las restricciones de las claves foráneas
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
};