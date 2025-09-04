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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->date('fecha');
            $table->string('titulo');
            $table->unsignedBigInteger('estado')->nullable();
            $table->foreign('estado')->references('id')->on('estados_presupuestos')->onDelete('set null');
            $table->bigInteger('total')->nullable();
            $table->unsignedBigInteger('cliente')->nullable();
            $table->foreign('cliente')->references('id')->on('clientes')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
            