<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningCourseCategoryContent>
 */
class LearningCourseCategoryContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 10),
            'learning_course_id' => rand(1, 50),
            'content' => '<h1>' . fake()->sentence . '</h1>' .
                        '<p>' . fake()->paragraph(5) . '</p>' .
                        '<ul><li>' . implode('</li><li>', fake()->words(5)) . '</li></ul>',
        ];
    }
}
