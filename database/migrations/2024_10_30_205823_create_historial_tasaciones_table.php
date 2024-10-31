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
        Schema::create('historial_tasaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tasacion_id'); // Tipo compatible con la clave primaria en 'tasacions'
            $table->enum('estado', ['Solicitado', 'En proceso', 'Tasación completada', 'Rechazado']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Para el usuario que realiza cambios
            $table->timestamps();

            // Definimos la clave foránea manualmente
            $table->foreign('tasacion_id')->references('id')->on('tasaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_tasaciones');
    }
};
