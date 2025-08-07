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
            $table->foreignId('register_id')->constrained('registers')->cascadeOnDelete();
            $table->integer("foro_score");
            $table->integer("event_score");
            $table->timestamps();
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
