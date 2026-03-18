<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // 1. Remove a chave estrangeira primeiro
            // O Laravel costuma nomear assim: tabela_coluna_foreign
            $table->dropForeign(['slot_id']);

            // 2. Agora remove o índice unique
            $table->dropUnique(['slot_id']);

            // 3. Recria a chave estrangeira, mas sem a restrição de ser única
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
        });
    }

public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Para reverter, teríamos que fazer o processo inverso
            $table->dropForeign(['slot_id']);
            $table->unique('slot_id');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
        });
    }
};
