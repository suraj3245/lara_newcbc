<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contact_colleges', function (Blueprint $table) {
            $table->id();
            $table->string('collegeName');
            $table->string('contactPersonName');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('hearAboutUs')->nullable();
            $table->text('additionalRequests')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_colleges');
    }
};
