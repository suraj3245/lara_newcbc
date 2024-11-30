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
        Schema::create('student_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('school_name_x');
            $table->string('board_x');
            $table->string('stream_x')->nullable();
            $table->year('passing_year_x');
            $table->decimal('percentage_x', 5, 2);
            $table->string('school_name_xii');
            $table->string('board_xii');
            $table->string('stream_xii')->nullable();
            $table->year('passing_year_xii');
            $table->decimal('percentage_xii', 5, 2);
            $table->string('college_name')->nullable();
            $table->string('university_name')->nullable();
            $table->string('degree')->nullable();
            $table->year('passing_year_college')->nullable();
            $table->decimal('percentage_college', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_education');
    }
};
