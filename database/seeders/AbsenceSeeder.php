<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('absences')->insert([
            [
                'attendance_id' => 1,
                'roster_id' => 14,
            ],
            [
                'attendance_id' => 1,
                'roster_id' => 18,
            ],
            [
                'attendance_id' => 1,
                'roster_id' => 25,
            ],
            [
                'attendance_id' => 2,
                'roster_id' => 28,
            ],
            [
                'attendance_id' => 2,
                'roster_id' => 29,
            ],
            [
                'attendance_id' => 2,
                'roster_id' => 30,
            ],
        ]);
    }
}
