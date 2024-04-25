<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $categories = [
            //Node JS
            [
                'name' => "Node.js HOME",
                'course_id' => 21,
                'step' => 1,
            ],
            [
                'name' => "Intro",
                'course_id' => 21,
                'step' => 2,
            ],
            [
                'name' => "Get Started",
                'course_id' => 21,
                'step' => 3,
            ],
            [
                'name' => "Modules",
                'course_id' => 21,
                'step' => 4,
            ],
            [
                'name' => "Http Modue",
                'course_id' => 21,
                'step' => 5,
            ],
            [
                'name' => "File System",
                'course_id' => 21,
                'step' => 6,
            ],
            [
                'name' => "URL Module",
                'course_id' => 21,
                'step' => 7,
            ],
            [
                'name' => "NPM",
                'course_id' => 21,
                'step' => 8,
            ],
            [
                'name' => "Events",
                'course_id' => 21,
                'step' => 9,
            ],
            [
                'name' => "Upload Files",
                'course_id' => 21,
                'step' => 10,
            ],
            [
                'name' => "Email",
                'course_id' => 21,
                'step' => 11,
            ]
        ];


        foreach ($categories as $categoryData) {
            DB::table('learning_course_categories')->insert($categoryData);
        }
    }
}
