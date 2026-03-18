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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // Relaciona com o ID do aluno (User) [cite: 14, 25]
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Relaciona com o horário específico [cite: 16]
            $table->foreignId('slot_id')->unique()->constrained()->onDelete('cascade'); 
            
            // Status para permitir Reagendamento e Cancelamento [cite: 17]
            $table->string('status')->default('active');
            
            $table->timestamps(); // Registra data de criação para o histórico [cite: 18, 29]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
