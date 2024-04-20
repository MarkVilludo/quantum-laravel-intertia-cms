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
        // id (INT PRIMARY KEY): Unique identifier for the question.
        // question_text (TEXT): The actual question text for the user to answer.
        // question_type (VARCHAR(255)): Optional field to specify the question type (e.g., multiple choice, true/false, open ended).
        // answer_options (TEXT): Optional field for storing comma-separated answer options (applicable for multiple-choice questions).
        // correct_answer (TEXT): The correct answer to the question.
        // created_at (DATETIME): Timestamp of question creation.
        // updated_at (DATETIME): Timestamp of question update.
        Schema::create('learning_course_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('learning_course_id');
            $table->integer('difficulty_level_id');
            $table->integer('duration')->nullable();
            $table->text('question_text');
            $table->string('question_type')->nullable();
            $table->text('option_a')->nullable();
            $table->text('option_b')->nullable();
            $table->text('option_c')->nullable();
            $table->text('option_d')->nullable();
            $table->text('correct_answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_course_questions');
    }
};
