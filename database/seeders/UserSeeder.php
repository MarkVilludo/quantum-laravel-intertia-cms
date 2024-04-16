<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'John Doe (TA)',
                'email' => 'test@gmail.com',
                'type' => 'admin', // Teaching Assistant role
                'image' => null, // Optional image path
                'password' => bcrypt('password'), // Hash the password before storing
            ],
            [
                'name' => 'Jane Smith (Student)',
                'email' => 'jane.smith@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Michael Lee (Student)',
                'email' => 'michael.lee@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('secretpassword'),
            ],
            [
                'name' => 'Alice Johnson (Student)',
                'email' => 'alice.johnson@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('student1234'),
            ],
            [
                'name' => 'David Williams (Student)',
                'email' => 'david.williams@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('strongpassword'),
            ],
            [
                'name' => 'Elizabeth Brown (Student)',
                'email' => 'elizabeth.brown@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('welcome123'),
            ],
            [
                'name' => 'James Garcia (Student)',
                'email' => 'james.garcia@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('learning1234'),
            ],
            [
                'name' => 'Sarah Miller (Student)',
                'email' => 'sarah.miller@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('password5678'),
            ],
            [
                'name' => 'Christopher Clark (Student)',
                'email' => 'christopher.clark@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('securepassword'),
            ],
            [
                'name' => 'Amanda Wright (Student)',
                'email' => 'amanda.wright@example.com',
                'type' => 'student',
                'image' => null,
                'password' => bcrypt('student9010'),
            ],
        ];

        foreach ($users as $userData) {
            DB::table('users')->insert($userData);
        }
    }
}