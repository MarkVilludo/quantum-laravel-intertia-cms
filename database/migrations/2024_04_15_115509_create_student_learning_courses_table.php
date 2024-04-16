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
        Schema::create('student_learning_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('learning_course_id');
            $table->integer('course_id');
            $table->integer('level_id')->nullable();
            $table->integer('quiz_progress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_learning_courses');
    }
};
