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
        Schema::create('exercices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descreption');
            $table->string('image');
            $table->string('calories');
            $table->string('location');
            $table->string('time');
            $table->string('premium');
            $table->foreignId('sesin_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercices');
    }
};
