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
        Schema::create('answer_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('response_id')->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->text('answer_filled')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_slots');
    }
};
