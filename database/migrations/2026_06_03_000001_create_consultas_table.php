<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120);
            $table->string('apellido', 120)->nullable();
            $table->string('email', 180);
            $table->string('telefono', 60)->nullable();
            $table->string('asunto', 180);
            $table->text('mensaje');
            $table->string('estado', 40)->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
