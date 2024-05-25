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
        Schema::create('read_modules', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('learning_course_id');
            $table->integer('module_id')->nullable();
            $table->integer('level')->nullable();
            $table->integer('step');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('read_modules');
    }
};
