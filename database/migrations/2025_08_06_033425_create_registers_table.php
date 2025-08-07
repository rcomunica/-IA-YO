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
                'joy',
                'sadness',
                'fear',
                'anger',
                'anxiety',
                'shame',
                'guilt',
                'love',
                'envy',
                'irritation',
            ]);
            $table->string("song");
            $table->foreignId('profesional_id')->constrained('profesionals')->cascadeOnDelete();
            $table->timestamps();
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
