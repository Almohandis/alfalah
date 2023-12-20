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
        Schema::create('review_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('juz_text');
            $table->string('day_text');
            $table->string('face_text');
            $table->double('review_faces');
            $table->tinyInteger('days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_plans');
    }
};
