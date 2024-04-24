<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\LearningCourseCategoryContent;
use Illuminate\Database\Seeder;

class CourseCategoryContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            LearningCourseCategoryContent::factory()->create([
                'category_id' => rand(1, 10),
                'learning_course_id' => 21,
                'content' => '<h1>' . fake()->sentence . '</h1>' .
                            '<p>' . fake()->paragraph(5) . '</p>' .
                            '<ul><li>' . implode('</li><li>', fake()->words(5)) . '</li></ul>',
            ]);
        }
    }
}
