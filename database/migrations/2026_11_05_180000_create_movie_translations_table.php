<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movie_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained()->cascadeOnDelete();
            $table->string('lang', 3);
            $table->string('title', 150);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unique(['movie_id', 'lang']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movie_translations');
    }
};
