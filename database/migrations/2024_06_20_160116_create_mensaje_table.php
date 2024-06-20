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
        // Schema::create('mensaje', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('origen');
        //     $table->bigInteger('destino');
        //     $table->string('mensaje', 1000);
        //     $table->string('llave', 50);
        //     $table->timestamps();
        // });

        Schema::create('mensaje', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('origen')->unsigned();
            $table->bigInteger('destino')->unsigned();
            $table->string('mensaje', 3000);
            $table->string('llave', 50);
            $table->timestamps();
        
            // Claves foráneas
            $table->foreign('origen')->references('id')->on('cuenta')->onDelete('cascade');
            $table->foreign('destino')->references('id')->on('cuenta')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensaje');
    }
};
