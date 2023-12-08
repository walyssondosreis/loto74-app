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
        Schema::create('concursos', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('id')->unique()->primary();
            $table->unsignedBigInteger('resultado_id')->nullable();
            $table->date('data_apuracao')->nullable();
            // $table->timestamps();
            // $table->foreign('resultado_id')->references('id')->on('resultados');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concursos');
    }
};
