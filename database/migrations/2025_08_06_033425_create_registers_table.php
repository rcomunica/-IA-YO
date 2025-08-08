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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->enum('emotion', [
                'alegria',
                'tristeza',
                'miedo',
                'enojo',
                'ansiedad',
                'verguenza',
                'culpa',
                'amor',
                'envidia',
                'irritacion',
            ]);
            $table->string("song");
            $table->unsignedBigInteger('profesional_id');
            $table->timestamps();
        });


        Schema::table('registers', function (Blueprint $table) {
            $table->foreign('profesional_id')->on('profesionals')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
