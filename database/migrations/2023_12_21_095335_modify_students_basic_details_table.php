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
        Schema::table('students_basic_details', function (Blueprint $table) {
            $table->string('marital_status')->nullable()->change();
            $table->string('physically_challenged')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students_basic_details', function (Blueprint $table) {
            $table->string('marital_status')->nullable(false)->change();
            $table->string('physically_challenged')->nullable(false)->change();
        });
    }
};
