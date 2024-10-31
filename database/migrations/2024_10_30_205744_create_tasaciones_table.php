<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasaciones', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_nombre');
            $table->string('cliente_contacto');
            $table->string('direccion');
            $table->decimal('precio', 10, 2)->nullable();
            $table->text('comentarios')->nullable();
            $table->enum('estado', ['Solicitado', 'En proceso', 'Tasación completada', 'Rechazado'])->default('Solicitado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasaciones');
    }
};
