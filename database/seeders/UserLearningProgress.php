<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserLearningProgress extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have some user IDs, course IDs, learning path IDs, and level IDs
        $userIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $courseIds = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5]; // Can be the same as course IDs or separate for learning paths
        $learningPathIds = [4, 2, 2, 2, 1, 2, 1, 4, 3, 4]; // Learning path IDs (null for courses)
        $levelIds = [1, 2, 1, 2, 1, 2, 1, 2, 1, 2]; // Replace with actual level IDs

        $enrollments = [];
        for ($i = 0; $i < 10; $i++) {
            $enrollments[] = [
                'user_id' => $userIds[$i],
                'learning_course_id' => $courseIds[$i],
                'course_id' => $learningPathIds[$i],
                'quiz_progress' => null, // Set to null initially
                'level_id' => $levelIds[$i], // Added level ID field
            ];
        }

        foreach ($enrollments as $enrollmentData) {
            DB::table('student_learning_courses')->insert($enrollmentData);
        }
    }
}
