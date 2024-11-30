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
        Schema::create('career_test_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('students');
            $table->integer('realistic_score')->default(0);
            $table->integer('investigative_score')->default(0);
            $table->integer('artistic_score')->default(0);
            $table->integer('social_score')->default(0);
            $table->integer('enterprising_score')->default(0);
            $table->integer('conventional_score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_test_results');
    }
};
