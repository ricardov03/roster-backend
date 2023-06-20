<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'name' => 'Section A',
                'course_id' => 2,
                'instructor_id' => 3,
            ],
            [
                'name' => 'Section B',
                'course_id' => 2,
                'instructor_id' => 4,
            ],
            [
                'name' => 'Section C',
                'course_id' => 2,
                'instructor_id' => 5,
            ],
            [
                'name' => 'Section A',
                'course_id' => 3,
                'instructor_id' => 6,
            ],
        ]);
    }
}
