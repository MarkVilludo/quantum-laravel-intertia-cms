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
                'course_id' => 21
            ],
            [
                'name' => "Intro",
                'course_id' => 21
            ],
            [
                'name' => "Get Started",
                'course_id' => 21
            ],
            [
                'name' => "Modules",
                'course_id' => 21
            ],
            [
                'name' => "Http Modue",
                'course_id' => 21
            ],
            [
                'name' => "File System",
                'course_id' => 21
            ],
            [
                'name' => "URL Module",
                'course_id' => 21
            ],
            [
                'name' => "NPM",
                'course_id' => 21
            ],
            [
                'name' => "Events",
                'course_id' => 21
            ],
            [
                'name' => "Upload Files",
                'course_id' => 21
            ],
            [
                'name' => "Email",
                'course_id' => 21
            ]
        ];


        foreach ($categories as $categoryData) {
            DB::table('learning_course_categories')->insert($categoryData);
        }
    }
}
