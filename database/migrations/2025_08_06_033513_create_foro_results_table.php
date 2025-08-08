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
        Schema::create('foro_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id');
            $table->integer("foro_score");
            $table->integer("event_score");
            $table->timestamps();

            $table->foreign('register_id')->on('registers')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foro_results');
    }
};
