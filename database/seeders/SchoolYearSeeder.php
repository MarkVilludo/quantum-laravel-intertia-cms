<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $levels = [
            'First Year' => 'Lorem Ipsum Donor',
            'Second Year' => 'Lorem Ipsum Donor.',
            'Third Year' => 'Lorem Ipsum Donor',
            'Fourth Year' => 'Lorem Ipsum Donor',
        ];

        // Insert levels into the database
        foreach ($levels as $name => $description) {
            DB::table('school_years')->insert([
                'name' => $name,
                'description' => $description,
            ]);
        }
    }
}
