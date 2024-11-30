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
        Schema::create('career_questions', function (Blueprint $table) {
            $table->id(); // Automatically creates an 'id' column as a primary key
            $table->string('question'); // Column for the question text
            $table->string('type'); // Column for the type of question
            $table->timestamps(); // Optional, creates 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_questions');
    }
};
