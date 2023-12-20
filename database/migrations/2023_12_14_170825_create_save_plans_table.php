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
        Schema::create('save_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('juz_text');
            $table->string('day_text');
            $table->string('face_text');
            $table->boolean('direction');
            $table->tinyInteger('juz');
            $table->double('save_faces');
            $table->double('confirm_faces')->default(0);
            $table->tinyInteger('days');
            $table->boolean('is_same');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_plans');
    }
};
