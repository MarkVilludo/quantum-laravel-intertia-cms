<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $courses = [
            [
                'title' => 'Introduction to Programming',
                'description' => 'Learn the fundamentals of programming concepts and basic syntax using a popular language like Python or JavaScript.',
                'duration' => '4 weeks',
                'year_id' => 1, // Replace with the actual category ID for Programming
            ],
            [
                'title' => 'Web Development Fundamentals',
                'description' => 'Master the building blocks of web development, including HTML, CSS, and JavaScript, to create interactive websites.',
                'duration' => '6 weeks',
                'year_id' => 1, // Replace with the actual category ID for Programming
            ],
            [
                'title' => 'Database Management Systems',
                'description' => 'Gain expertise in storing, retrieving, and manipulating data efficiently using relational databases like MySQL or PostgreSQL.',
                'duration' => '8 weeks',
                'year_id' => 2, // Replace with the actual category ID for Data Management
            ],
            [
                'title' => 'Object-Oriented Programming',
                'description' => 'Explore object-oriented programming principles like classes, objects, inheritance, and polymorphism to design well-structured applications.',
                'duration' => '10 weeks',
                'year_id' => 2, // Replace with the actual category ID for Programming
            ],
            [
                'title' => 'Data Structures and Algorithms',
                'description' => 'Understand fundamental data structures (arrays, linked lists, trees) and algorithms (sorting, searching) to optimize code performance.',
                'duration' => '12 weeks',
                'year_id' => 2, // Replace with the actual category ID for Programming
            ],
            [
                'title' => 'User Interface (UI) and User Experience (UX) Design',
                'description' => 'Learn best practices for designing user interfaces and user experiences that are both visually appealing and user-friendly.',
                'duration' => '8 weeks',
                'year_id' => 3, // Replace with the actual category ID for Design
            ],
            [
                'title' => 'Cybersecurity Fundamentals',
                'description' => 'Gain awareness of cybersecurity threats and vulnerabilities, and explore methods to protect systems and data from cyberattacks.',
                'duration' => '6 weeks',
                'year_id' => 3, // Replace with the actual category ID for Security
            ],
            [
                'title' => 'Data Visualization',
                'description' => 'Learn techniques for creating compelling and informative data visualizations using tools like Tableau, Power BI, or Python libraries.',
                'duration' => '8 weeks',
                'year_id' => 2, // Replace with the actual category ID for Data Science
            ],
            [
                'title' => 'Software Testing',
                'description' => 'Master software testing methodologies, tools, and techniques to ensure the quality, functionality, and reliability of software applications.',
                'duration' => '8 weeks',
                'year_id' => 2, // Replace with the actual category ID for Software Engineering
            ],
            [
                'title' => 'Version Control with Git',
                'description' => 'Learn how to use Git, a popular version control system, to track code changes, collaborate with others, and manage software projects effectively.',
                'duration' => '4 weeks',
                'year_id' => 1, // Replace with the actual category ID for Development Fundamentals
            ],
            [
                'title' => 'Agile Development Methodologies',
                'description' => 'Explore agile development methodologies like Scrum and Kanban, which promote iterative development, collaboration, and continuous improvement.',
                'duration' => '6 weeks',
                'year_id' => 2, // Replace with the actual category ID for Software Engineering
            ],
            [
                'title' => 'API Development and Integration',
                'description' => 'Learn how to design, build, and integrate APIs (Application Programming Interfaces) to enable communication and data exchange between different applications.',
                'duration' => '8 weeks',
                'year_id' => 3, // Replace with the actual category ID for Web Development
            ],
            [
                'title' => 'Machine Learning Fundamentals',
                'description' => 'Get introduced to the core concepts of machine learning, including supervised and unsupervised learning algorithms, and their applications.',
                'duration' => '8 weeks',
                'year_id' => 3, // Replace with the actual category ID for Artificial Intelligence
            ],
            [
                'title' => 'Blockchain Technology',
                'description' => 'Explore the fundamentals of blockchain technology, distributed ledgers, and their potential applications in various industries.',
                'duration' => '6 weeks',
                'year_id' => 3, // Replace with the actual category ID for Emerging Technologies
            ],
            [
                'title' => 'Internet of Things (IoT) Fundamentals',
                'description' => 'Learn about the Internet of Things (IoT) and its components, including sensors, actuators, and communication protocols.',
                'duration' => '6 weeks',
                'year_id' => 3, // Replace with the actual category ID for Emerging Technologies
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Learn to build native or cross-platform mobile applications for iOS and Android using frameworks like React Native or Flutter.',
                'duration' => '10 weeks',
                'year_id' => 3, // Replace with the actual category ID for Mobile Development
            ],
            [
                'title' => 'Cloud Computing Fundamentals',
                'description' => 'Gain an understanding of cloud computing concepts, services (IaaS, PaaS, SaaS), and deployment strategies on platforms like AWS, Azure, or GCP.',
                'duration' => '6 weeks',
                'year_id' => 3, // Replace with the actual category ID for Cloud Computing
            ],
            [
                'title' => 'Big Data Analytics Fundamentals',
                'description' => 'Gain an understanding of big data concepts, processing techniques, and tools like Hadoop and Spark for analyzing large datasets.',
                'duration' => '10 weeks',
                'year_id' => 3, // Replace with the actual category ID for Data Science
            ],
            [
                'title' => 'UX/UI Design Specialization',
                'description' => 'Deepen your knowledge in UX/UI design principles, interaction design, and user research to create exceptional user experiences.',
                'duration' => '16 weeks',
                'year_id' => 4, // Replace with the actual category ID for Design
            ],
            [
                'title' => 'Ethical Hacking and Penetration Testing',
                'description' => 'Learn ethical hacking methodologies and penetration testing techniques to identify and exploit vulnerabilities in computer systems.',
                'duration' => '12 weeks',
                'year_id' => 4, // Replace with the actual category ID for Security
            ],
            [
                'title' => 'Node.JS Tutorial',
                'description' => 'Lorem Ipsum Donor Lorem Ipsum Donor Lorem Ipsum Donor Lorem Ipsum Donor',
                'duration' => '12 weeks',
                'year_id' => 4, // Replace with the actual category ID for Security
            ],
        ];

        foreach ($courses as $learningCourse) {
            DB::table('learning_courses')->insert($learningCourse);
        }
    }
}
