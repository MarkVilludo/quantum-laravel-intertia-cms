<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $levels = [
            'Beginner' => 'Suitable for those with no prior experience.',
            'Intermediate' => 'Requires some foundational knowledge.',
            'Advanced' => 'Designed for experienced learners.',
        ];

        // Insert levels into the database
        foreach ($levels as $name => $description) {
            DB::table('difficulty_levels')->insert([
                'name' => $name,
                'description' => $description,
            ]);
        }
    }
}
