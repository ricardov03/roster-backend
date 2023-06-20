<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'name' => 'Privacy and Technology',
                'code' => 'COMPSCI 105',
                'description' => 'What is privacy, and how is it affected by recent developments in technology? This course critically examines popular concepts of privacy and uses a rigorous analysis of technologies to understand the policy and ethical issues at play.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Computational Thinking and Problem Solving',
                'code' => 'COMPSCI 32',
                'description' => 'An introduction to computational thinking, useful concepts in the field of computer science, and the art of computer programming using Python.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Systems Programming and Machine Organization',
                'code' => 'COMPSCI 61',
                'description' => 'Fundamentals of computer systems programming, machine organization, and performance tuning. This course provides a solid background in systems programming and a deep understanding of low-level machine organization and design.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Design of Useful and Usable Interactive Systems',
                'code' => 'COMPSCI 79',
                'description' => 'Formerly CS 179, the course covers skills and techniques necessary to design innovative interactive products that are useful, usable and that address important needs of people other than yourself. You will learn how to uncover needs that your customers cannot even articulate.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
