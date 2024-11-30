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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('college_full_name');
            $table->string('college_short_name');
            $table->string('type');
            $table->string('approved_by');
            $table->year('established_year');
            $table->longText('about')->nullable();
            $table->longText('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
